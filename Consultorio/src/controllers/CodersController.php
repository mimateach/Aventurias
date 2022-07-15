<?php
    namespace App\Controllers;

    use App\Core\View;
    use App\Models\Coders;

    class CodersController {
        public function __construct() {
            if (isset($_GET["action"]) && ($_GET["action"] == "delete")) {
                $this-> delete($_GET["id"]);
                return;
            }

            if (isset($_GET["action"]) && ($_GET["action"] == "create")) {
                $this-> create();
                return;
            }

            $this->index();
        }

        public function index() {
            $coder = new Coders();
            $coders = $coder->all();
            new View("coderList", ["coder" => $coders]);
        }

        public function delete ($id) {
            $coderHelper = new Coders();
            $coder = $coderHelper->findById($id);
            $coder->destroy();

            $this->index();
        }

        public function create() {
            new View ("createCoder");
        }
               
    }