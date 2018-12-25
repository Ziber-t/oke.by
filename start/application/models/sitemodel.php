<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemodel extends CI_Model {

    function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->library('ion_auth');

    }


    /*

    	returns all available sites

    */

    public function all( $forUserID = '' ) {

    	//if $forUserID is set, this means we're looking for the sites belonging to a specific user

    	if( $forUserID == '' ) {

    		$user = $this->ion_auth->user()->row();
    		$userID = $user->id;

    		if( !$this->ion_auth->is_admin() ) {

    			$this->db->where('users_id', $userID);

    		}

    	} else {

    		$this->db->where('users_id', $forUserID);

    	}



    	$this->db->from('sites');
    	$this->db->where('sites_trashed', 0);
    	$this->db->join('users', 'sites.users_id = users.id');

    	$query = $this->db->get();

    	$res = $query->result();


		$allSites = array();//array holding all sites and associated data

		foreach( $res as $site ) {

			$temp = array();

			$temp['siteData'] = $site;


			//get the number of pages

			$query = $this->db->from('pages')->where('sites_id', $site->sites_id)->get();

			$res = $query->result();

			$temp['nrOfPages'] = $query->num_rows();

			$this->db->flush_cache();


			//grab the first frame for each site, if any

			$q = $this->db->from('pages')->where('pages_name', 'index')->where('sites_id', $site->sites_id)->get();

			if( $q->num_rows() > 0 ) {

				$res = $q->result();

				$indexPage = $res[0];

				$q = $this->db->from('frames')->where('pages_id', $indexPage->pages_id)->order_by('frames_id', 'asc')->limit(1)->get();

				if( $q->num_rows() > 0 ) {

					$res = $q->result();

					$temp['lastFrame'] = $res[0];

				} else {

					$temp['lastFrame'] = '';

				}

			} else {

				$temp['lastFrame'] = '';

			}


			$allSites[] = $temp;

		}

		return $allSites;

    }


    /*


	    checks to see if a site belongs to this user

    */

    public function isMine( $siteID ) {

	    $user = $this->ion_auth->user()->row();

    	$userID = $user->id;


    	$q = $this->db->from('sites')->where('sites_id', $siteID)->get();

    	if( $q->num_rows() > 0 ) {

	    	$res = $q->result();

	    	if( $res[0]->users_id != $userID ) {

		    	return false;

	    	} else {

		    	return true;

	    	}

    	} else {

	    	return false;

    	}

    }



    /*

    	creates a new, empty shell site

    */

    public function createNew() {

    	$user = $this->ion_auth->user()->row();

    	$userID = $user->id;

    	//create site
    	$data = array(
    	   'sites_name' => 'Новый сайт',
    	   'users_id' => $userID,
    	   'sites_created_on' => time()

    	);

		$data2 = array(
    	   'firstsite' => 1
    	);

		$dimaTest = $this->db->from('users')->where('id', $userID)->get();
		$testius = $dimaTest->result();

		$testius = $testius[0];
		$testius = $testius->firstsite;

		$testOplata = $this->db->from('users')->where('id', $userID)->get();
		$testius2 = $testOplata->result();
		$testius2 = $testius2[0];
		$testius2 = $testius2->opl;

		if($testius == 1){
			if($testius2 == 1){
				$this->db->insert('sites', $data);
				$this->db->where('id', $userID);
				$this->db->update('users', $data2);




				$newSiteID = $this->db->insert_id();


				//create empty index page

				return $newSiteID;
			}

		}elseif($testius == 0){

			$this->db->insert('sites', $data);
			$this->db->where('id', $userID);
			$this->db->update('users', $data2);




			$newSiteID = $this->db->insert_id();


			//create empty index page

			return $newSiteID;
    	}
    }




    /*

    	creates a new site item, including pages and frames

    */

    public function create($siteName, $siteData) {

    	$user = $this->ion_auth->user()->row();

    	$userID = $user->id;


    	//create the site item first

    	$data = array(
    		'users_id' => $userID,
    		'sites_name' => $siteName,
    	   	'sites_created_on' => time()
    	);

    	$this->db->insert('sites', $data);


    	$siteID = $this->db->insert_id();

    	//die( "ID: ".$this->db->insert_id() );


    	//next we create the pages and frames

    	foreach( $siteData as $pageName => $frames ) {

    		$data = array(
    			'sites_id' => $siteID,
    			'pages_name' => $pageName,
    			'pages_timestamp' => time()
    		);

    		$this->db->insert('pages', $data);

    		$pageID = $this->db->insert_id();



    		//page is done, now all the frames for this page

    		foreach( $frames as $frameData ) {

    			$data = array(
    				'pages_id' => $pageID,
    				'sites_id' => $siteID,
    				'frames_content' => $frameData['frameContent'],
    				'frames_height' => $frameData['frameHeight'],
    				'frames_original_url' => $frameData['originalUrl'],
					'frames_sandbox' => $frameData['frameSandbox'],
					'frames_loaderfunction' => $frameData['frameLoaderfunction'],
    				'frames_timestamp' => time()
    			);

    			$this->db->insert('frames', $data);

    		}

    	}

    	return $siteID;

    }



    /*

    	updates an existing site item, including pages and frames

    */

    public function update($siteID, $siteName, $siteData, $contents = '', $pagesData = '') {

       	//update the site details first

    	$data = array(
   			'sites_name' => $siteName,
   			'sites_lastupdate_on' => time()
   		);

    	$this->db->where('sites_id', $siteID);
    	$this->db->update('sites', $data);



    	//delete all pages and frames and re-save

    	$query = $this->db->from('pages')->where('sites_id', $siteID)->get();

    	$pages = $query->result();

    	foreach( $pages as $page ) {

    		//delete all frames

    		$this->db->where('pages_id', $page->pages_id);
    		$this->db->delete('frames');


    		//delete page

    		$this->db->where('pages_id', $page->pages_id);
    		$this->db->delete('pages');

    	}


    	//all gone, re-save

    	foreach( $siteData as $pageName => $frames ) {

			$pagePreview = ( $contents != '' )? $contents[$pageName] : '';

    		$data = array(
    			'sites_id' => $siteID,
    			'pages_name' => $pageName,
    			'pages_timestamp' => time(),
				'pages_preview' => $pagePreview
    		);

    		if( isset($pagesData[$pageName]) ) {

    			$data['pages_title'] = $pagesData[$pageName]['pages_title'];
    			$data['pages_meta_keywords'] = $pagesData[$pageName]['pages_meta_keywords'];
    			$data['pages_meta_description'] = $pagesData[$pageName]['pages_meta_description'];
    			$data['pages_header_includes'] = $pagesData[$pageName]['pages_header_includes'];

    		}

    		$this->db->insert('pages', $data);

    		$pageID = $this->db->insert_id();



    		//page is done, now all the frames for this page

    		if( is_array( $frames ) ) {

    			foreach( $frames as $frameData ) {

    				$data = array(
    					'pages_id' => $pageID,
    					'sites_id' => $siteID,
    					'frames_content' => $frameData['frameContent'],
    					'frames_height' => $frameData['frameHeight'],
    					'frames_original_url' => $frameData['originalUrl'],
						'frames_sandbox' => $frameData['frameSandbox'],
						'frames_loaderfunction' => $frameData['frameLoaderfunction'],
    					'frames_timestamp' => time()
    				);

    				$this->db->insert('frames', $data);

    			}

    		}

    	}

    }


    /*

    	updates a site's meta data (name, ftp details, etc)

    */

    public function updateSiteData($siteData) {

        $super = $siteData['siteSettings_remoteUrl'];

        if(!$super || empty($super) || $super == 'oke.su') {
            return false;
        }

        $query = $this->db->from('sites')->where('sites_id', $siteData['siteID'])->get();
    	$res = $query->result();

        if(empty($res[0]->remote_url)) {
            mkdir("/var/www/newartic/data/www/$super", 0775);
        } else {
            rename("/var/www/newartic/data/www/". $res[0]->remote_url, "/var/www/newartic/data/www/$super");
        }

		mkdir("/var/www/newartic/data/www/$super", 0775);

  		//test the FTP data

  		$this->load->model('ftpmodel');

  		$path = "/www/$super";

  		$result = $this->ftpmodel->test( $siteData['siteSettings_ftpServer'], $siteData['siteSettings_ftpUser'], $siteData['siteSettings_ftpPassword'], $siteData['siteSettings_ftpPort'], $path );

  		$ftpOk = 0;

  		if ( $result['connection'] ) {

  			$ftpOk = 1;

  		}


  		$data = array(
  			'sites_name' => $siteData['siteSettings_siteName'],
			'ftp_server' => $siteData['siteSettings_ftpServer'],
  			'ftp_user' => $siteData['siteSettings_ftpUser'],
  			'ftp_password' => $siteData['siteSettings_ftpPassword'],
  			'ftp_path' => "/www/$super",
  			'ftp_port' => $siteData['siteSettings_ftpPort'],
  			'ftp_ok' => $ftpOk,
  			'remote_url' => $siteData['siteSettings_remoteUrl'],
			'ftp_published' => 1
 		);

  		$this->db->where('sites_id', $siteData['siteID']);
  		$this->db->update('sites', $data);

  		if( $ftpOk == 1 ) {
  			return true;
  		} else {
  		    return false;
  		}
	}

    public function checkDomain($domain, $site_id) {
        $query = $this->db->from('sites')->where('sites_id', $site_id)->get();
    	$res = $query->result();
        if($res[0]->remote_url == $domain) {
            return true;
        }
        $query = $this->db->from('sites')->where('remote_url', $domain)->get();
    	$res = $query->result();
        if(empty($res)) {
            return true;
        }
        return false;
    }




    /*

    	takes a site ID and returns all the site data, or false is the site doesn't exist

    */

    public function getSite($siteID) {

    	$query = $this->db->from('sites')->where('sites_id', $siteID)->get();

    	if( $query->num_rows() == 0 ) {

    		return false;

    	}

    	$res = $query->result();

    	$site = $res[0];

    	$siteArray = array();
    	$siteArray['site'] = $site;


    	//get the pages + frames

    	$query = $this->db->from('pages')->where('sites_id', $site->sites_id)->get();

    	$res = $query->result();


    	$pageFrames = array();

    	foreach( $res as $page ) {

    		//get the frames for each page

    		$query = $this->db->from('frames')->where('pages_id', $page->pages_id)->order_by('frames_id')->get();

    		$pageFrames[$page->pages_name] = $query->result();

    	}

    	$siteArray['pages'] = $pageFrames;


    	//grab the assets folders as well
    	$this->load->helper('directory');

    	$folderContent = directory_map($this->config->item('elements_dir'), 2);

    	$assetFolders = array();

    	foreach( $folderContent as $key => $item ) {

    		if( is_array($item) ) {

    			array_push($assetFolders, $key);

    		}

    	}


    	$siteArray['assetFolders'] = $assetFolders;

    	return $siteArray;

    }



    /*

    	grabs a single frame and returns it

    */

    public function getSingleFrame($frameID) {

    	$query = $this->db->from('frames')->where('frames_id', $frameID)->get();

    	$res = $query->result();

    	return $res[0];

    }



    /*

    	gets the assets and pages of a site

    */

    public function getAssetsAndPages( $siteID ) {

    	//get the asset folders first, we only grab the first level folders inside $this->config->item('elements_dir')

    	$this->load->helper('directory');

    	$folderContent = directory_map($this->config->item('elements_dir'), 2);

    	$assetFolders = array();

    	foreach( $folderContent as $key => $item ) {

    		if( is_array($item) ) {

    			array_push($assetFolders, $key);

    		}

    	}



    	//now we get the pages

    	$query = $this->db->from('pages')->where('sites_id', $siteID)->get();

    	$pages = $query->result();

    	$return = array();

    	$return['assetFolders'] = $assetFolders;
    	$return['pages'] = $pages;

    	return $return;

    }



    /*

    	moves a site to the trash
    	1111
    */

    public function trash($siteID) {

        $this->load->helper('file');

		$user = $this->ion_auth->user()->row();
    	$userID = $user->id;

		$data2 = array(
    		'firstsite' => 0
    	);

		$testpay = $this->db->from('users')->where('id', $userID)->get();
		$testpay = $testpay->result();
		$testpay = $testpay[0];
		$testpay = $testpay->opl;

        if($testpay == 0){
            $this->db->where('id', $userID);
            $this->db->update('users', $data2);
        }

        $query = $this->db->from('sites')->where('sites_id', $siteID)->get();
    	$res = $query->result();
        $super = $res[0]->remote_url;

        if($super && !empty($super) && $super !== 'oke.su') {
            delete_files("/var/www/newartic/data/www/$super", TRUE);
            rmdir("/var/www/newartic/data/www/$super");
        }

        $this->db->where('sites_id', $siteID);
        $this->db->delete('sites');

        $this->db->where('sites_id', $siteID);
        $this->db->delete('pages');

        $this->db->where('sites_id', $siteID);
        $this->db->delete('frames');

    }



    /*

    	returns all admin images

    */

    public function adminImages() {

    	$folderContent = directory_map($this->config->item('images_dir'), 2);

    	if( $folderContent ) {

    		//print_r( $folderContent );

    		$adminImages = array();

    		foreach( $folderContent as $key => $item ) {

    			if( !is_array($item) ) {

    				//check the file extension

    				$tmp = explode(".", $item);


    				//prep allowed extensions array

    				$temp = explode("|", $this->config->item('images_allowedExtensions'));


    				if( in_array($tmp[1], $temp) ) {

    					array_push($adminImages, $item);

    				}

    			}

    		}

    		return $adminImages;

    	} else {

    		return false;

    	}

    }



    /*

    	trashes a users' sites

    */

    public function deleteAllFor( $userID ) {

        $this->load->helper('file');

    	$query = $this->db->from('sites')->where('users_id', $userID)->get();
        $sites = $query->result();
        foreach ($sites as $site) {

            $super = $site->remote_url;

            if($super && !empty($super) && $super !== 'oke.su') {
                delete_files("/var/www/newartic/data/www/$super", TRUE);
                rmdir("/var/www/newartic/data/www/$super");
            }

            $this->db->where('sites_id', $site->sites_id);
            $this->db->delete('sites');

            $this->db->where('sites_id', $site->sites_id);
            $this->db->delete('pages');

            $this->db->where('sites_id', $site->sites_id);
            $this->db->delete('frames');
        }
    }



	/*

		grabs a singlepage for preview

	*/

	public function getPage($siteID, $pageName) {

		$q = $this->db->from('pages')->where('sites_id', $siteID)->where('pages_name', $pageName)->order_by('pages_timestamp', 'asc')->get()->row();

		if( $q->pages_preview != '' ) {

			return $q;

		} else {

			return false;

		}

	}

}
