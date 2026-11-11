<?php

declare(strict_types=1);

namespace Muleta\Image;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Interfaces\ImageInterface;

/**
 * Fachada sobre o Intervention Image 4 para o conjunto de operações
 * que as bibliotecas já usavam na API da versão 2.
 */
class Image
{
    private ImageInterface $image;

    private ?string $encoded = null;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    /**
     * Abre uma imagem a partir de caminho, binário, upload ou outra instância.
     */
    public static function make(mixed $source): self
    {
        if ($source instanceof self) {
            return clone $source;
        }

        $manager = self::manager();

        if ($source instanceof \SplFileInfo) {
            return new self($manager->decodeSplFileInfo($source));
        }

        if (is_string($source) && is_file($source)) {
            return new self($manager->decodePath($source));
        }

        if (is_string($source)) {
            return new self($manager->decodeBinary($source));
        }

        return new self($manager->decode($source));
    }

    public function __clone()
    {
        $this->image = clone $this->image;
        $this->encoded = null;
    }

    public function width(): int
    {
        return $this->image->width();
    }

    public function height(): int
    {
        return $this->image->height();
    }

    /**
     * @param  callable(Constraint): void|null  $callback
     */
    public function resize(mixed $width, mixed $height, ?callable $callback = null): self
    {
        $constraint = new Constraint();
        if ($callback !== null) {
            $callback($constraint);
        }

        $width = $this->dimension($width);
        $height = $this->dimension($height);

        if ($constraint->aspectRatio || $width === null || $height === null) {
            $method = $constraint->preventUpsize ? 'scaleDown' : 'scale';
            $this->image->{$method}($width, $height);
        } else {
            $method = $constraint->preventUpsize ? 'resizeDown' : 'resize';
            $this->image->{$method}($width, $height);
        }

        $this->encoded = null;

        return $this;
    }

    /**
     * @param  callable(Constraint): void|null  $callback
     */
    public function fit(mixed $width, mixed $height = null, ?callable $callback = null, string $position = 'center'): self
    {
        $constraint = new Constraint();
        if ($callback !== null) {
            $callback($constraint);
        }

        $width = $this->dimension($width) ?? $this->width();
        $height = $this->dimension($height) ?? $width;
        $method = $constraint->preventUpsize ? 'coverDown' : 'cover';
        $this->image->{$method}($width, $height, $position);
        $this->encoded = null;

        return $this;
    }

    public function crop(mixed $width, mixed $height, mixed $x = 0, mixed $y = 0): self
    {
        $this->image->crop(
            $this->dimension($width) ?? $this->width(),
            $this->dimension($height) ?? $this->height(),
            $this->dimension($x) ?? 0,
            $this->dimension($y) ?? 0,
        );
        $this->encoded = null;

        return $this;
    }

    public function insert(mixed $watermark, string $position = 'top-left', mixed $x = 0, mixed $y = 0): self
    {
        $element = $watermark instanceof self ? $watermark->native() : $watermark;
        $this->image->insert($element, $this->dimension($x) ?? 0, $this->dimension($y) ?? 0, $position);
        $this->encoded = null;

        return $this;
    }

    public function orientate(): self
    {
        $this->image->orient();
        $this->encoded = null;

        return $this;
    }

    public function save(?string $path = null, mixed $quality = null): self
    {
        if ($quality === null) {
            $this->image->save($path);
        } else {
            $this->image->save($path, quality: (int) $quality);
        }

        return $this;
    }

    public function encode(mixed $format = null, mixed $quality = null): self
    {
        if ($format === 'data-url') {
            $encoded = $this->image->encode();
            $mime = method_exists($encoded, 'mediaType') ? $encoded->mediaType() : 'application/octet-stream';
            $this->encoded = 'data:'.$mime.';base64,'.base64_encode((string) $encoded);

            return $this;
        }

        $extension = $this->normalizeExtension($format);
        $options = $quality === null ? [] : ['quality' => (int) $quality];
        $encoded = $extension === null
            ? $this->image->encode()
            : $this->image->encodeUsingFileExtension($extension, ...$options);

        $this->encoded = (string) $encoded;

        return $this;
    }

    public function native(): ImageInterface
    {
        return $this->image;
    }

    public function __toString(): string
    {
        if ($this->encoded === null) {
            $this->encode();
        }

        return (string) $this->encoded;
    }

    private function dimension(mixed $value): ?int
    {
        if ($value === null || $value === '' || $value === 'null') {
            return null;
        }

        return (int) $value;
    }

    private function normalizeExtension(mixed $format): ?string
    {
        if (! is_string($format) || $format === '') {
            return null;
        }

        $format = strtolower($format);

        return $format === 'jpeg' ? 'jpg' : $format;
    }

    private static function manager(): ImageManager
    {
        return new ImageManager(new Driver());
    }
}
