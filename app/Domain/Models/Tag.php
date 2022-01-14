<?php

namespace App\Domain\Models;

/**
 * Class Tag
 * @package App\Domain\Models
 *
 * @property string $title
 * @property string $created_at
 */
class Tag extends Model
{
    /**
     * @var string
     */
    protected $table = 'tags';

    /**
     * @return array
     */
    public function posts(): array
    {
        return $this->query(
            "SELECT p.* FROM posts p
                INNER JOIN post_tag pt ON pt.post_id = p.id
                WHERE pt.tag_id = ? ORDER BY p.created_at DESC",
            [$this->id]);
    }
}
