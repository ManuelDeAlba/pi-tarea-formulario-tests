<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class PracticaTest extends TestCase
{
    public function testFilesExistence(): void
    {
        $this->assertFileExists('conexion.php');
        $this->assertFileExists('index.html');
        $this->assertFileExists('form.php');
        $this->assertFileExists('usuarios.php');
    }

    public function testForm(): void
    {
        $form = file_get_contents('index.html');
        $this->assertStringContainsStringIgnoringCase('action="form.php"', $form, $message = 'No se ha definido action');
        $this->assertStringContainsStringIgnoringCase('method="post"', $form, $message = 'No está asignado el método post');
    }

    public function testStore(): void
    {
        $form = file_get_contents('form.php');
        $this->assertStringContainsStringIgnoringCase('$_POST', $form, $message = 'No se utiliza $_POST');
        $this->assertStringContainsStringIgnoringCase('header(', $form, $message = 'No se encuenra método header()');
        $this->assertStringContainsStringIgnoringCase('Location: usuarios.php', $form, $message = 'No se redirecciona hacia usuarios.php');
        $this->assertStringContainsStringIgnoringCase('INSERT INTO', $form, $message = 'No se llama a INSERT INTO');
    }

    public function testPost(): void
    {
        $client = new Client();
        $response = $client->post('http://localhost/formulario-tests/form.php', [
            'form_params' => [
                'nombre' => 'Prueba Nombre',
                'correo' => 'prueba@test.com',
                'contrasena' => 'pruebacontrasena'
            ]
        ]);

        $code = $response->getStatusCode();

        $this->assertStringContainsStringIgnoringCase('Prueba Nombre', (string) $response->getBody(), $message = 'No está muestra registro creado');
    }
}
