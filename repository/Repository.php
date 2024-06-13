<?php

require_once 'config/connection.php';

class Repository {
    private $connection;
    private $stmt;
    private function connect() {
        /* Connect using SQL Server Authentication. */  
        $this->connection = get_connection();
    }

    protected function query(string $query) {
        $error = null;
        $results = [];
        try {
            $this->connect();
            $stmt = $this->connection->query($query);

            while( $row = $stmt->fetch_assoc())  
            {  
                array_push($results, $row);
            } 

        } catch (\Throwable $th) {
            $error = $th;
        } finally {
            $this->close();
        }

        if ($error) {
            throw $error;
        }

        return $results;
    }

    protected function execute(string $query) {
        $error = null;
        try {
            $this->connect();
            // $this->stmt = sqlsrv_query( $this->connection, $query);
        } catch (\Throwable $th) {
            $error = $th;
        } finally {
            $this->close();
        }

        if ($error) {
            throw $error;
        }
    }

    private function close() {
        $this->connection->close(); 
    }
}
