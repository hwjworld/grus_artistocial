<?php

class ArtsyGene{
    public int $id;
    public string $resourceId;
    public string $name;
    public string $description;
    public array $image_versions;
    public string $thumbnail;
    public string $image_url; // 这是url模板，请不要直接使用，需要用getAllImageUrl来用
    public string $permalink;    

    private string $version_placeholder = "{image_version}";

    /**
     * 返回模板的img url
     * 通常5个 {image_version}.jpg
     */
    function getAllImageUrls(){
        $imgs = array();
        foreach($this->image_versions as $k=> $v){
            $url = str_replace($this->version_placeholder, $v, $this->image_url);
            array_push($imgs, $url);
        }
        return $imgs;
    }}
?>