<?php
    
    class beeDatabaseModel
    {
        var $db;
        
        public function beeDatabaseModel construct(PDO $db)
        {
            $this->db = $db;
        }
        
        public function getAllObservations()
        {
            $sql = "SELECT hive_id, collection_id, sample_period, num_mites FROM bee_observations";
            
            return $this->db->query($query);
            
        }
        
    }
    
?>