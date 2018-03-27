<?PHP

    /**
    * THIS CLASS IS GENERATED BY MODULE BUILDER
    * PLEASE DO NOT CHANGE THIS CLASS
    * PLACE ANY CUSTOMIZATIONS IN C_Ward
    */


    class C_Ward_sugar extends Basic {
        var $new_schema = true;
        var $module_dir = 'C_Ward';
        var $object_name = 'C_Ward';
        var $table_name = 'c_ward';
        var $importable = true;
        var $id;
        var $name;
        var $date_entered;
        var $date_modified;
        var $modified_user_id;
        var $modified_by_name;
        var $created_by;
        var $created_by_name;
        var $description;
        var $deleted;
        var $created_by_link;
        var $modified_user_link;
        var $team_id;
        var $team_set_id;
        var $team_count;
        var $team_name;
        var $team_link;
        var $team_count_link;
        var $teams;
        var $assigned_user_id;
        var $assigned_user_name;
        var $assigned_user_link;
        /**
        * This is a depreciated method, please start using __construct() as this method will be removed in a future version
        *
        * @see __construct
        * @depreciated
        */
        function C_Ward_sugar(){
            self::__construct();
        }

        public function __construct(){
            parent::__construct();
        }

        public function bean_implements($interface){
            switch($interface){
                case 'ACL': return true;
            }
            return false;
        }
    }
?>