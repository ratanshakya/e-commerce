<?php
namespace App\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @ORM\Table(name="images")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="images")
     * @ORM\JoinColumn(name="productId", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\Column(type="string")
     */
    private $name;
    
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * The uploaded file
     *
     * @var [UploadedFile]
     */
    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('file', new Assert\Image());
        $metadata->addPropertyConstraint('name', new Assert\Type('string'));
        $metadata->addPropertyConstraint('description', new Assert\Type('string'));
        $metadata->addPropertyConstraint('size', new Assert\Type('integer'));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function getSize(): int
    {
        return $this->size;
    }
    
    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function setSize($size)
    {
        $this->size = $size;
    }
}
