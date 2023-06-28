<?php

// -- KIRBY UTILITY -- //

function get_gmaps_url($query) {
	return "https://www.google.com/maps/search/?api=1&query=" . urlencode( $query );
}

function get_css_bg($url) {
	return "background-image: url('" . $url . "')";
}

function get_placeholder_r() {
	$imgpath = site()->placeholder()->toFiles()->shuffle()->first()->url();
	return $imgpath;
}

function get_css_bg_placeholder_r() {
	return get_css_bg( get_placeholder_r() );
}

function activity_has_passed( $activity ) {

	// E controlliamo
	$has_passed = false;

	// Prendiamo l'ultima data dell'attività
	$date_all = $activity->date_all()->split("-");

	if ( count( $date_all ) ) {
		$date_last = $date_all[ count($date_all) - 1 ];
	
		if ( strtotime( $date_last ) < strtotime( date('d-m-Y') ) ) {
			$has_passed = true;
		}
	}

	return $has_passed;
}

function filter_pages_by_tags_from_param($page_collection, $param, $field) {
	// Se c'è, prendiamo il param 'tags' dall'url
	if ($tags_active = urldecode(param($param))) {
		// Splittiamo i tag (sono un'unica stringa) nella lista dei tag utilizzati
		$tags_active = explode("," , $tags_active);
		// Filtriamo i progetti
		$page_collection = $page_collection->filterBy($field, 'in', $tags_active, ',');
	}
	return $page_collection;
}

function downloads_to_array($download_structure) {
	// Checking downloads
	$downloads = [];
	foreach ($download_structure as $download) {
		// Getting file info
		if ( $download->file()->isNotEmpty() ) {
			$file = $download->file()->toFile();
			$file_name =  $download->file_name()->toString();
			$file_url = $file->url();
			// Adding file to the main list
			$downloads[ $file_name ] = $file_url;
		}
	}
	return $downloads;
}

    function generateRandomString($length = 10) {
        $characters = 'abcdefghilmnopqrstuvz';
        $charactersLength = strlen($characters);
		$randomString = "";
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }        

function update_url_current_param($param, $value) {
	// Getting params
	$params = params();
	$params[$param] = $value;
	return url( page()->url(), ["params" => $params]);
}

function get_pages_from_string($findable, $paths_string, $separator = ",")
{
	$paths = $paths_string->split($separator);
	$pages = [];
	foreach ($paths as $path) {
		$pages[] = $findable->find($path);
	}
	return $pages;
}


function get_tags_multiple_fields($collection, $fields) {
	$tags_used = [];
	foreach ($fields as $field) {
		$tags_used = array_merge( $tags_used, get_tags_from_pages( $collection, $field) );
	}
	return $tags_used;
}
		
function get_tags_from_pages($collection, $field) {
	// -- In alternativa: --//
	// fetch the basic set of pages
  	// $articles = $page->children()->flip();
  	// fetch all tags
  	// $tags = $articles->pluck('categorie', ',', true);

	$tags_used = [];
	foreach ($collection as $pagina) {
		// Get prende il field da una stringa
		$categorie = $pagina
			->content()
			->get($field)
			->split();
		foreach ($categorie as $categoria) {
			$tags_used[] = $categoria;
		}
	}
	// Fixing and cleaning array
	$tags_used = array_unique($tags_used);
	sort($tags_used);

	return $tags_used;
}

// Tags
function get_pages_uri_from_tags($collection, $field, $tags, $separator = ",")
{
	// List with all activities with appropriate categories (and duplicates) to count occurrences
	$pages_correlated_raw = [];

	// Getting pages with similar tages
	// Also duplicates, since we're iterating multiple times on the same list
	foreach ($tags as $tag) {
		$collection_filtered = $collection->filterBy($field, $tag, $separator);
		foreach ($collection_filtered as $pagina) {
			$pages_correlated_raw[] = $pagina->uri();
		}
	}

	// Array with items counted, then sorted
	$pages_correlated = array_count_values($pages_correlated_raw);
	arsort($pages_correlated);

	return array_keys($pages_correlated);
}

function cal_percentage($num_amount, $num_total) {
	$count1 = $num_amount / $num_total;
	$count2 = $count1 * 100;
	$count = number_format($count2, 0);
	return $count;
  }

  
function get_struct_values_by_field(object $struct, string $field)
{
	$value_list = [];
	foreach ($struct as $item) {
		$value_list[] = $item->content()->get($field);
	}
	return $value_list;
}

function get_struct_values_by_fields(object $struct, array $fields)
{
	$value_list = [];
	foreach ($struct as $item) {
		$value = [];
		foreach ($fields as $field) {
			$value[$field] = $item->content()->get($field);
		}
		$value_list[] = $value;
	}
	return $value_list;
}
