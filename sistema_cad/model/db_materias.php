<?php

    require_once 'connect.php';

    Class Db_materias extends Connect {

        public function materias ()
        {
            $connect = $this->conectar($this->dados_conexao('materias'));
            $sql = mysqli_query(
                $connect[0], 
                'SELECT 
                    materias.*, 
                    professores.nome as nome_prof 
                FROM materias 
                LEFT JOIN professores ON professores.id = materias.professor 
                WHERE materias.id = (SELECT MAX(materias.id) FROM  materias)'
            );

            if ($sql) {
                $dados = $sql->fetch_assoc();
            } else {
                echo 'Erro ao executar a busca!';
            }
            return $dados;
        }

        public function inserir_materias ($dados)
        {
            $connect = $this->conectar($this->dados_conexao('materias'));
            $sql = mysqli_query($connect[0], 
            "INSERT INTO materias (
                materia,
                professor
            ) VALUES (
                '".$dados['materia']."',
                '".$dados['professor']."'
            )"
        );

            return $sql;
        }

        public function lista_materias()
        {
            $connect = $this->conectar($this->dados_conexao('materias'));
            $sql = mysqli_query(
                $connect[0], 
                'SELECT 
                    materias.*, 
                    professores.nome as nome_prof 
                FROM materias 
                LEFT JOIN professores ON professores.id = materias.professor'
            );

            if ($sql) {
                $dados = $sql->fetch_all(MYSQLI_NUM);
            } else {
                echo 'Erro ao executar a busca!';
            }

            return $dados;
        }
    }

?>