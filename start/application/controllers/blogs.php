<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('ckeditor');

		$this->load->model('blogmodel');

		$this->data['pageTitle'] = $this->lang->line('blogs_page_title');

	}


	/*

		lists all blogs

	*/

	public function index($slug)
	{
		$this->data['blogs'] = $this->blogmodel->getAll();
		$this->data['page'] = "blogs";
		$this->load->view('blogs/blogs', $this->data);
	}

    /*

		lists all blogs admin

	*/

	public function blogsAdmin()
	{

        if( !$this->ion_auth->is_admin() ) {
			die('Access not allowed');
		}

		//grab us some sites
		$this->data['blogs'] = $this->blogmodel->getAll();

		$this->data['page'] = "blogs";
		$this->load->view('blogs/blogsAdmin', $this->data);
	}



	/*

		load page builder

	*/

	public function add($data) {

        if( !$this->ion_auth->is_admin() ) {
			die('Access not allowed');
		}

		$this->blogmodel->insert($data);

	}


    public function create($blogID) {

        if( !$this->ion_auth->is_admin() ) {
			die('Access not allowed');
		}
        if(!empty($blogID) && empty($_POST)) {
            $blogData = $this->blogmodel->get($blogID);
            $this->data['blog'] = $blogData;
            $this->CKEditor = new CKEditor('/start/ckeditor/');
            $this->data['page'] = "blog";
    		$this->load->view('blogs/create', $this->data);
        } else if(!empty($_POST)){
            $data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
            $data['description_short'] = !empty($_POST['description_short']) ? $_POST['description_short'] : '';
            $data['description'] = !empty($_POST['description']) ? $_POST['description'] : '';
            $data['meta_keys'] = !empty($_POST['meta_keys']) ? $_POST['meta_keys'] : '';
            $data['meta_description'] = !empty($_POST['meta_description']) ? $_POST['meta_description'] : '';
            if(!empty($_POST['blogs_id'])) {
                $this->blogmodel->update($_POST['blogs_id'], $data);
                redirect('/blogs/blogsAdmin', 'refresh');
            } else {
                $this->blogmodel->insert($data);
                redirect('/blogs/blogsAdmin', 'refresh');
            }
        } else {
            $this->CKEditor = new CKEditor('/start/ckeditor/');
            $this->data['page'] = "blog";
    		$this->load->view('blogs/create', $this->data);
        }
	}


	/*

		get and retrieve single blog data

	*/

	public function blog($slug) {

        $blogData = $this->blogmodel->getBySlug($slug);
        if( $blogData == false ) {
            $this->session->set_flashdata('error', $this->lang->line('blogs_blog_error1'));
            redirect('/blogs/', 'refresh');
        } else {
            $this->data['blog'] = $blogData;
            $this->data['page'] = "blog";
            $this->load->view('blogs/blog', $this->data);
        }
	}


	public function delete($blogID) {

        if( !$this->ion_auth->is_admin() ) {
			die('Access not allowed');
		}

		if( $blogID == '' || $blogID == 'undefined' ) {

            //blog could not be deleted, redirect to /blogs, with error message
			$this->session->set_flashdata('error', $this->lang->line('blogs_blog_error2'));
			redirect('/blogs/blogsAdmin/', 'refresh');

		} else {

            $this->blogmodel->delete($blogID);
            redirect('/blogs/blogsAdmin/', 'refresh');

        }
	}


}

/* End of file blogs.php */
