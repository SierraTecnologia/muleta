<?php

declare(strict_types=1);

namespace Muleta\Image;

/**
 * Restrições de redimensionamento no formato usado pelo Intervention Image 2.
 *
 * A implementação fala com o Intervention Image 4 por baixo.
 */
class Constraint
{
    public bool $aspectRatio = false;

    public bool $preventUpsize = false;

    /**
     * Mantém a proporção original durante o redimensionamento.
     */
    public function aspectRatio(): void
    {
        $this->aspectRatio = true;
    }

    /**
     * Impede que a imagem cresça além do tamanho original.
     */
    public function upsize(): void
    {
        $this->preventUpsize = true;
    }
}
