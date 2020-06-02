<?php
require_once __DIR__ . '/bdd.php';

function addHost(string $type, string $nbBed, string $nbBedroom, string $nbBathroom, string $parking, string $wifi, string $pool, string $toilets, string $airConditioning, string $centralHeating, string $TV, string $dinnerware, string $essentials): bool {
    $pdo = getPdo();

    $query = "INSERT INTO properties (type, nbBed, nbBedroom, nbBathroom, parking, wifi, pool, toilets, airConditioning, centralHeating, TV, dinnerware, essentials) VALUES (:type, :nbBed, :nbBedroom, :nbBathroom, :parking, :wifi, :pool, :toilets, :airConditioning, :centralHeating, :TV, :dinnerware, :essentials)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        'type' => $type,
        'nbBed' => $nbBed,
        'nbBedroom' => $nbBedroom,
        'nbBathroom' => $nbBathroom,
        'parking' => $parking,
        'wifi' => $wifi,
        'pool' => $pool,
        'toilets' => $toilets,
        'airConditioning' => $airConditioning,
        'centralHeating' => $centralHeating,
        'TV' => $TV,
        'dinnerware' => $dinnerware,
        'essentials' => $essentials
    ]);
}

function listHost(?string $search = null): array
{
  $pdo = getPdo();
  $query = "SELECT * FROM announces";

  if ($search !== null) {
    $query = $query . " AND title LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
  } else {
    $stmt = $pdo->query($query);
  }

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}