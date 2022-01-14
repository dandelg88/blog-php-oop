<?php

namespace App\Domain\Models;

use DateTime;
use Exception;

/**
 * Class Post
 * @package App\Domain\Models
 *
 * @property string $title
 * @property string $body
 * @property string $created_at
 */
class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @return string
     * @throws Exception
     */
    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y \a \l\a\s h:ia');
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return trim(substr($this->body, 0, 110)) . '...';
    }

    /**
     * @return array
     */
    public function tags(): array
    {
        return $this->query(
            "SELECT t.* FROM tags t
                INNER JOIN post_tag pt ON pt.tag_id = t.id
                WHERE pt.post_id = ? ORDER BY t.title",
            [$this->id]);
    }

    /**
     * @param array $data
     * @param array|null $relations
     * @return bool
     */
    public function create(array $data, ?array $relations = null): bool
    {
        if (parent::create($data)) {
            $post_id = $this->db->getPDO()->lastInsertId();
        }

        if (isset($post_id)) {
            if (!is_null($relations)) {
                foreach ($relations as $tag_id) {
                    $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
                    $stmt->execute([$post_id, $tag_id]);
                }
            }
            return true;
        }

        return false;
    }

    /**
     * @param array $data
     * @param array|null $relations
     * @return bool
     */
    public function update(array &$data, ?array $relations = null): bool
    {
        parent::update($data);

        $post_id = $this->id;

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([$post_id]);

        if (!is_null($relations)) {
            foreach ($relations as $tag_id) {
                $stmt = $this->db->getPDO()->prepare("INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)");
                $stmt->execute([$post_id, $tag_id]);
            }
        }

        $this->updateTimestamps();

        return $result;
    }
}
