<?php

/**
 * Class Auth
 *
 * This class allows to manage the authentication from student.
 */

class Auth
{
    private $session;
    private $options = [
        'restriction_msg' => "Vous n'avez pas le droit d'accéder à cette page"
    ];

    /**
     * Auth constructor.
     *
     * @param $session
     * @param array $options
     */
    public function __construct($session, $options = [])
    {
        $this->options = array_merge($this->options, $options);
        $this->session = $session;
    }

    /**
     * This function return a Student.class from the database with his id.
     *
     * @param int $id
     */
    public function getUserById($db, $id){
        $query = $db->query('SELECT * FROM utilisateur WHERE id_EGNOM = ?', [$id]);
        $student = $query->fetch();
        if($student){
            return $student;
        }
    }

    /**
     * This function register the new student.
     *
     * @param $db
     * @param $name
     * @param $firstname
     * @param $email
     * @param $password
     */

    /*public function register($db, $email, $password)
    {
        $bpassword = password_hash($password, PASSWORD_BCRYPT);
        $db->query('INSERT INTO users (email, password) VALUES (?,?)', [$email, $bpassword]);
    }

    /**
     * This function check if the student is logged and restrict different pages of website (example: profil.php)
     */
    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->sendFlash('danger', $this->options['restriction_msg']);
            header('Location: index.php');
            exit();
        }
    }

    /**
     * This funciton return $_SESSION of student or if it does not exist, false.
     *
     * @return bool
     */
    public function getStudent()
    {
        if (!$this->session->read('auth')) {
            return false;
        }
        return $this->session->read('auth');
    }

    /**
     * She puts the $student variable in the $_SESSION['auth'] (variable de connection)
     *
     * @param $student
     */
    public function connect($student)
    {
        $this->session->write('auth', $student);
    }

    /**
     * This function logs the student.
     *
     * @param $db
     * @param $email
     * @param $password
     * @param bool $remember
     * @return bool
     */
    public function login($db, $id, $password)
    {
        $student = $db->query('SELECT * FROM utilisateur WHERE id_EGNOM = ?', [$id])->fetch();
        if ($password == $student->mdp) {
            $this->connect($student);
            return $student;
        } else {
            return false;
        }
    }

    /**
     * This function logout the student by removing the $_SESSION['auth']
     */
    public function logout()
    {
        $this->session->delete('auth');
    }

    /**
     * Return the Session class
     *
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }
}