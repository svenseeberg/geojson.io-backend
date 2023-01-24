<?php

namespace App\Entity;

use App\Repository\GeoJSONRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeoJSONRepository::class)
 */
class GeoJSON
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=102400, nullable=true)
     */
    private $geojson;

    /**
     * @ORM\Column(type="string", length=102400, nullable=true)
     */
    private $wkt;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $related_object;

    /**
     * @ORM\Column(type="date")
     */
    private $last_changed;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeojson(): ?string
    {
        return $this->geojson;
    }

    public function setGeojson(?string $geojson): self
    {
        $this->geojson = $geojson;

        return $this;
    }

    public function getWkt(): ?string
    {
        return $this->wkt;
    }

    public function setWkt(?string $wkt): self
    {
        $this->wkt = $wkt;

        return $this;
    }

    public function getRelatedObject(): ?string
    {
        return $this->related_object;
    }

    public function setRelatedObject(?string $related_object): self
    {
        $this->related_object = $related_object;

        return $this;
    }

    public function getLastChanged(): ?\DateTimeInterface
    {
        return $this->last_changed;
    }

    public function setLastChanged(\DateTimeInterface $last_changed): self
    {
        $this->last_changed = $last_changed;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
