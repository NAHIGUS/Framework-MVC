<?php
    class Home extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function home($params)
        {
            $data['pqge_id'] = 1;
            $data['tag_page'] = "Home";
            $data['page_tittle'] = "Pagina Principal";
            $data['page_name'] = "home";
            $this->views->getView($this, "home", $data);
        }
    }
?>