<?php

namespace SiObjects\Components\Book;

use App\Models\Model;

class View extends Model
{

    protected $fillable = ['user_id', 'views'];

    /**
     * Get all owning viewable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function viewable()
    {
        // @todo Verificar depois //return $this->morphTo();
    }
}
