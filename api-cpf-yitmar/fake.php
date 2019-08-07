<?php


// realizando o autoload das bibliotecas

require_once 'vendor/autoload.php';


// instanciando o gerador de fakes

$faker = Faker\Factory::create(‘pt_BR’);


// gerando um nome fake (o PHP_EOL é apenas para pular a linha antes do echo do próximo comando)

echo $faker->name . PHP_EOL;

// gerando um número de um dígito aleatório

echo $faker->randomDigit . PHP_EOL;

// gerando uma extensão de arquivo aleatório

echo $faker->fileExtension . PHP_EOL;

// gerando um cpf aleatório

echo $faker->cpf . PHP_EOL;

// gerando um número de celular aleatório

echo $faker->cellphonenumber . PHP_EOL;