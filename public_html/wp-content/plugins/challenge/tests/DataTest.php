<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Data.php';

use Challenge\Data;

final class DataTest extends TestCase
{
    public function testResponseIsNotNull(): void
    {
        $data = new Data('https://restcountries.com/v3.1/all');

        // Act
        $stream = $data->listElement();
        $streamContents = $stream->getContents();
        $paises = json_decode($streamContents, true);

        $this->assertNotNull($paises, 'El array de países decodificado no debería ser nulo.');
        $this->assertIsArray($paises, 'Los países decodificados deberían ser un array.');

    }

    // public function testIsValidUrl(): void
    // {
    //     $this->assertSame($string, $email->asString());
    // }
}
