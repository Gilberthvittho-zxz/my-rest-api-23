<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;

/**
 * Class Book.
 *
 * @author GilberthVittho <gilberth.422024003@ukrida.ac.id>
 *
 * @OA\Schema(
 *     description="Book model",
 *     title="Book model",
 *     required={"title", "author"},
 *     @OA\Xml(
 *         name="Book"
 *     )
 * )
 */
class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'publication_year',
        'cover',
        'description',
        'price',
    ];

    protected $casts = [
        'price' => 'integer',
        'publication_year' => 'string',
    ];

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title of the book",
     *      example="Who Moved My Cheese?"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Author",
     *      description="Author of the book",
     *      example="Spencer Johnson"
     * )
     *
     * @var string
     */
    public $author;

    /**
     * @OA\Property(
     *      title="Publisher",
     *      description="Publisher of the book",
     *      example="Putnam"
     * )
     *
     * @var string
     */
    public $publisher;

    /**
     * @OA\Property(
     *      title="Publication Year",
     *      description="Publication year of the book",
     *      example="1998"
     * )
     *
     * @var string
     */
    public $publication_year;

    /**
     * @OA\Property(
     *      title="Cover",
     *      description="Cover image URL of the book",
     *      example="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1388639171/4894.jpg"
     * )
     *
     * @var string
     */
    public $cover;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the book",
     *      example="A simple parable that reveals profound truths about change"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Price",
     *      description="Price of the book",
     *      format="int64",
     *      example=45000
     * )
     *
     * @var integer
     */
    public $price;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;
}