<?php

    echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>' . base_url() . '</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>' . base_url("satin-al") . '</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>' . base_url("blog") . '</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>';
    foreach($blogs AS $blog) {
        echo '<url>
                <loc>' . base_url("blog/".$blog["Ad"]) . '</loc>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
              </url>';
    }

    echo '</urlset>';