<?php

    class techtransfer extends DataBoundObject {

        protected $Results;
        protected $Count;
        protected $Total;
        protected $Perpage;
        protected $Page;

        protected function DefineTableName() {
                return("techtransfer");
        }

        protected function DefineRelationMap() {
                return(array(
                        "results" => "Results",
                        "count" => "Count",
                        "total" => "Total",
                        "perpage" => "Perpage",
                        "page" => "Page"));
        }
              
    }

?>