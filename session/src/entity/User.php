<?php

class User
{
  private string $prenom;
  private string $nom;
  private string $email;
  private string $password;

  public function __construct(array $data = [])
  {
    $this->hydrate($data);
  }

  private function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method(htmlentities($value));
      }
    }
  }

  /**
   * Get the value of prenom
   *
   * @return  string
   */
  public function getPrenom(): string
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @param   string  $prenom  
   *
   * @return void
   */
  public function setPrenom(string $prenom): void
  {
    $this->prenom = trim(ucfirst($prenom));
  }

  /**
   * Get the value of nom
   *
   * @return  string
   */
  public function getNom(): string
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @param   string  $nom  
   *
   * @return void
   */
  public function setNom(string $nom): void
  {
    $this->nom = trim(ucfirst($nom));
  }

  /**
   * Get the value of email
   *
   * @return  string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @param   string  $email  
   *
   * @return void
   */
  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  /**
   * Get the value of password
   *
   * @return  string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @param   string  $password  
   *
   * @return void
   */
  public function setPassword(string $password): void
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getFullName(): string
  {
    return $this->prenom . " " . $this->nom;
  }
}

?>