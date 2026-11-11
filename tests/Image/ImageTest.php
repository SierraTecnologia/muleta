<?php

declare(strict_types=1);

namespace Muleta\Tests\Image;

use Muleta\Image\Constraint;
use Muleta\Image\Image;
use PHPUnit\Framework\TestCase;

/**
 * Cobre a fachada que preserva as operações do Intervention Image 2
 * em cima do Intervention Image 4.
 */
class ImageTest extends TestCase
{
    /**
     * Redimensiona pela largura e mantém a proporção quando a altura vem vazia.
     */
    public function testResizeKeepsAspectWhenOnlyWidthIsGiven(): void
    {
        $path = $this->png(200, 100);

        $image = Image::make($path)->resize(100, null);

        $this->assertSame(100, $image->width());
        $this->assertSame(50, $image->height());
    }

    /**
     * Com as duas medidas e aspectRatio, a imagem cabe na caixa sem esticar.
     */
    public function testResizeFitsInsideBoxWhenAspectRatioIsRequested(): void
    {
        $path = $this->png(200, 100);

        $image = Image::make($path)->resize(80, 80, function (Constraint $constraint): void {
            $constraint->aspectRatio();
        });

        $this->assertSame(80, $image->width());
        $this->assertSame(40, $image->height());
    }

    /**
     * upsize() impede que a imagem cresça além do original.
     */
    public function testResizeDoesNotEnlargeWhenUpsizeIsBlocked(): void
    {
        $path = $this->png(200, 100);

        $image = Image::make($path)->resize(400, null, function (Constraint $constraint): void {
            $constraint->upsize();
        });

        $this->assertSame(200, $image->width());
        $this->assertSame(100, $image->height());
    }

    /**
     * fit() recorta para cobrir exatamente a caixa pedida.
     */
    public function testFitCoversTheRequestedBox(): void
    {
        $path = $this->png(200, 100);

        $image = Image::make($path)->fit(50, 50);

        $this->assertSame(50, $image->width());
        $this->assertSame(50, $image->height());
    }

    /**
     * crop() e encode('data-url') continuam no contrato antigo.
     */
    public function testCropAndDataUrlEncoding(): void
    {
        $path = $this->png(40, 20);

        $encoded = (string) Image::make($path)->crop(10, 10, 0, 0)->encode('data-url');

        $this->assertStringStartsWith('data:', $encoded);
        $this->assertStringContainsString('base64,', $encoded);
    }

    /**
     * Cria um PNG temporário no tamanho pedido.
     */
    private function png(int $width, int $height): string
    {
        if (! function_exists('imagecreatetruecolor')) {
            $this->markTestSkipped('A extensão GD não está disponível.');
        }

        $canvas = imagecreatetruecolor($width, $height);
        if ($canvas === false) {
            $this->fail('Não foi possível criar a imagem de teste.');
        }

        $color = imagecolorallocate($canvas, 20, 80, 160);
        imagefilledrectangle($canvas, 0, 0, $width, $height, $color);

        $path = tempnam(sys_get_temp_dir(), 'muleta-img-');
        if ($path === false) {
            $this->fail('Não foi possível criar o arquivo temporário.');
        }

        $png = $path.'.png';
        rename($path, $png);
        imagepng($canvas, $png);
        imagedestroy($canvas);

        return $png;
    }
}
