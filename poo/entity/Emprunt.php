<?php

final class Emprunt
{
	private ?int $montant = null;
	private ?float $taux = null;
	private ?int $duree = null;

	private int $nbMois;
	private float $tauxPourcent;
	private float $mensualites;
	private float $montantTotal;
	private float $coutEmprunt;

	private array $errors = [];

	public function __construct(array $data = [])
	{
		$this->hydrate($data);

		if (!empty($data)) {
			$this->setMensualites();
			$this->setMontantTotal();
			$this->setCoutEmprunt();
		}
	}

	private function hydrate(array $data): void
	{
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) {
				$this->$method(htmlentities($value));
			}
		}
	}


	/**
	 * Get the value of montant
	 *
	 * @return  ?int
	 */
	public function getMontant(): ?int
	{
		return $this->montant;
	}

	/**
	 * Set the value of montant
	 *
	 * @param   int  $montant  
	 *
	 * @return void
	 */
	public function setMontant(int $montant): void
	{
		if ($montant < 1) {
			$this->setError('montant', "Le montant ne peut pas être inférieur à zéro");
			return;
		}

		$this->montant = $montant;
	}

	/**
	 * Get the value of taux
	 *
	 * @return  ?float
	 */
	public function getTaux(): ?float
	{
		return $this->taux;
	}

	/**
	 * Set the value of taux
	 *
	 * @param   float  $taux  
	 *
	 * @return void
	 */
	public function setTaux(float $taux): void
	{
		$this->taux = $taux;
		$this->setTauxPourcent($taux);
	}

	/**
	 * Get the value of duree
	 *
	 * @return  ?int
	 */
	public function getDuree(): ?int
	{
		return $this->duree;
	}

	/**
	 * Set the value of duree
	 *
	 * @param   int  $duree  
	 *
	 * @return void
	 */
	public function setDuree(int $duree): void
	{
		$this->duree = $duree;
		$this->setNbMois($duree);
	}

	/**
	 * Get the value of nbMois
	 *
	 * @return  int
	 */
	public function getNbMois(): int
	{
		return $this->nbMois;
	}

	/**
	 * Set the value of nbMois
	 *
	 * @param   int  $nbMois  
	 *
	 * @return void
	 */
	public function setNbMois(int $nbAnnees): void
	{
		$this->nbMois = $nbAnnees * 12;
	}

	/**
	 * Get the value of tauxPourcent
	 *
	 * @return  float
	 */
	public function getTauxPourcent(): float
	{
		return $this->tauxPourcent;
	}

	/**
	 * Set the value of tauxPourcent
	 *
	 * @param   float  $tauxPourcent  
	 *
	 * @return void
	 */
	public function setTauxPourcent(float $taux): void
	{
		$this->tauxPourcent = $taux / 100;
	}

	/**
	 * Get the value of mensualites
	 *
	 * @return  float
	 */
	public function getMensualites(): float
	{
		return $this->mensualites;
	}

	/**
	 * Set the value of mensualites
	 *
	 * @param   float  $mensualites  
	 *
	 * @return void
	 */
	public function setMensualites(): void
	{
		$this->mensualites = round(($this->montant * ($this->tauxPourcent / 12)) / (1 - pow(1 + $this->tauxPourcent / 12, -$this->nbMois)), 2);
	}

	/**
	 * Get the value of montantTotal
	 *
	 * @return  float
	 */
	public function getMontantTotal(): float
	{
		return $this->montantTotal;
	}

	/**
	 * Set the value of montantTotal
	 *
	 * @param   float  $montantTotal  
	 *
	 * @return void
	 */
	public function setMontantTotal(): void
	{
		$this->montantTotal = $this->mensualites * $this->nbMois;
	}

	/**
	 * Get the value of coutEmprunt
	 *
	 * @return  float
	 */
	public function getCoutEmprunt(): float
	{
		return $this->coutEmprunt;
	}

	/**
	 * Set the value of coutEmprunt
	 *
	 * @param   float  $coutEmprunt  
	 *
	 * @return void
	 */
	public function setCoutEmprunt(): void
	{
		$this->coutEmprunt = round($this->montantTotal - $this->montant, 1);
	}

	/**
	 * Get the value of errors
	 *
	 * @return  array
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}

	/**
	 * Set the value of errors
	 *
	 * @param   array  $errors  
	 *
	 * @return void
	 */
	public function setError(string $propriete, string $message): void
	{
		$this->errors[$propriete] = $message;
	}

	public function hasError(string $propriete): string|bool
	{
		return $this->errors[$propriete] ?? false;
	}
}
