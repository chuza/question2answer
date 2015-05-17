<?php
	class qa_feed_widget {
		var $directory;
		var $urltoroot;
		var $provider;

		function load_module($directory, $urltoroot, $type, $provider) {
			$this->directory = $directory;
			$this->urltoroot = $urltoroot;
			$this->provider = $provider;
		}
		
		function option_default($option) {
			switch($option) {
				case 'qa_feed_title':
					return 'Blog Posts';
				case 'qa_feed_count':
					return 'http://qa-themes.com/feed/';
				case 'qa_feed_count':
					return 10;
				case 'qa_feed_nofollow':
					return false;
				case 'qa_feed_gzip':
					return true;
			}
		}

		function admin_form()
		{
			$saved=false;
			
			if (qa_clicked('qa_feed_save_button')) {
				qa_opt('qa_feed_title', qa_post_text('qa_feed_title_field'));
				qa_opt('qa_feed_url', qa_post_text('qa_feed_url_field'));
				qa_opt('qa_feed_count', (int)qa_post_text('qa_feed_count_field'));
				qa_opt('qa_feed_thumbnail', (int)qa_post_text('qa_feed_thumbnail_field'));
				qa_opt('qa_feed_thumbnail_width', (int)qa_post_text('qa_feed_thumbnail_width_field')); 
				qa_opt('qa_feed_thumbnail_hight', (int)qa_post_text('qa_feed_thumbnail_hight_field'));
				qa_opt('qa_feed_nofollow', (int)qa_post_text('qa_feed_nofollow_field'));
				qa_opt('qa_feed_gzip', (int)qa_post_text('qa_feed_gzip_field'));
				$saved=true;
			}
			
			return array(
				'ok' => $saved ? 'Feed Widget settings saved' : null,
				
				'fields' => array(
					array(
						'label' => 'Widget Title:',
						'type' => 'string',
						'value' => qa_opt('qa_feed_title'),
						'tags' => 'NAME="qa_feed_title_field"',
					),
					array(
						'label' => 'Feed URL:',
						'type' => 'string',
						'value' => qa_opt('qa_feed_url'),
						'tags' => 'NAME="qa_feed_url_field"',
					),
					array(
						'label' => 'number of recent feeds:',
						'suffix' => 'item',
						'type' => 'number',
						'value' => (int)qa_opt('qa_feed_count'),
						'tags' => 'NAME="qa_feed_count_field"',
					),
					array(
						'type' => 'blank',
					),
					array(
						'label' => 'Show image thumbnails<small>"Thumbnail image will be extracted from RSS feed and added to each item."</small>',
						'type' => 'checkbox',
						'value' => (bool)qa_opt('qa_feed_thumbnail'),
						'tags' => 'NAME="qa_feed_thumbnail_field"',
					),
					array(
						'label' => 'Thumbnail Hight:',
						'suffix' => 'px',
						'type' => 'number',
						'value' => (int)qa_opt('qa_feed_thumbnail_hight'),
						'tags' => 'NAME="qa_feed_thumbnail_hight_field"',
					),
					array(
						'label' => 'Thumbnail Width:',
						'suffix' => 'px',
						'type' => 'number',
						'value' => (int)qa_opt('qa_feed_thumbnail_width'),
						'tags' => 'NAME="qa_feed_thumbnail_width_field"',
					),

					array(
						'label' => 'Don\'t pass SEO juice to link targets. <small>"this option adds "NoFollow" to link relation attribute."</small>',
						'type' => 'checkbox',
						'value' => (bool)qa_opt('qa_feed_nofollow'),
						'tags' => 'NAME="qa_feed_nofollow_field"',
					),
					array(
						'label' => 'Decompress feed if it\'s GZip(recommended). if you are sure feed is not compressed with GZip you can disable this options',
						'type' => 'checkbox',
						'value' => (bool)qa_opt('qa_feed_gzip'),
						'tags' => 'NAME="qa_feed_gzip_field"',
					),
				),
				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'NAME="qa_feed_save_button"',
					),
				),
			);
		}

		function gzdecoder($d){
			$f=ord(substr($d,3,1));
			$h=10;$e=0;
			if($f&4){
				$e=unpack('v',substr($d,10,2));
				$e=$e[1];$h+=2+$e;
			}
			if($f&8){
				$h=strpos($d,chr(0),$h)+1;
			}
			if($f&16){
				$h=strpos($d,chr(0),$h)+1;
			}
			if($f&2){
				$h+=2;
			}
			$u = gzinflate(substr($d,$h));
			if($u===FALSE){
				$u=$d;
			}
			return $u;
		}
	
		function allow_template($template)
		{
			$allow=false;
			
			switch ($template)
			{
				case 'activity':
				case 'qa':
				case 'questions':
				case 'hot':
				case 'ask':
				case 'categories':
				case 'question':
				case 'tag':
				case 'tags':
				case 'unanswered':
				case 'user':
				case 'users':
				case 'search':
				case 'admin':
				case 'custom':
					$allow=true;
					break;
			}
			
			return $allow;
		}

		
		function allow_region($region)
		{
			return ($region=='side');
		}
		

		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$url = qa_opt('qa_feed_url');
			$count=(int)qa_opt('qa_feed_count');
			$title=qa_opt('qa_feed_title');

			$themeobject->output('<aside class="qa-feed-widget">');
				$themeobject->output('<H2 class="qa-feed-header" style="margin-top:0; padding-top:0;">'.$title.'</H2>');

			$file = $this->directory . 'cache/' . $title . '_content.txt';
			$modified = @filemtime( $file );
			$now = time();
			$interval = 3600; // 1 hour
			// Cache File
			if ( empty($modified) || ( ( $now - $modified ) > $interval ) ) {
				// read live content
				$content = file_get_contents($url);
				if (qa_opt('qa_feed_gzip'))
					$content = $this->gzdecoder( $content );
				if ( $content ) {
				// cache content
					$cache = fopen( $file, 'w' );
					fwrite($cache, $content);
					fclose( $cache );
				}
			}else{
				//read content from cache
				$content =  file_get_contents( $file ) ;
			}

			$x = new SimpleXmlElement($content);  
			echo '<ul class="qa-feed-list">'; 
			$i=0;

			$nofollow = (bool)qa_opt('qa_feed_nofollow');
			$rel = '';
			if ($nofollow)
				$rel = 'rel="nofollow"';
			if(qa_opt('qa_feed_thumbnail')){
				$thumbnail_w = qa_opt('qa_feed_thumbnail_width');		
				$thumbnail_h = qa_opt('qa_feed_thumbnail_hight');				
				$get_thumbnails = true;
			}
			
			foreach($x->channel->item as $entry) {  
				if($get_thumbnails){
					$namespaces = $entry->getNameSpaces( true );
					$media = $entry->children( $namespaces['media'] );
					$thumbnail = $media->content->thumbnail->attributes()->url;
					if(! empty($thumbnail))
						$thumbnail = '<img class="qa-feed-thumbnail" src="' . $thumbnail . ($thumbnail_w > 0 ? '" width="' . $thumbnail_w . '"' : '') . ($thumbnail_h > 0 ? ' hight="' . $thumbnail_h . '"' : '') . '> ';
					else
						$thumbnail = '';
				}
				echo "<li class=\"qa-feed-item\"><a href='$entry->link' $rel title='$entry->title'>" . $thumbnail . '<span class="qa-feed-link-title">' . $entry->title . "</span></a></li>";  
				$i++;
				if ($i>=$count)
					break;
			}  
			echo "</ul>";  
			
			
			$themeobject->output('</aside>');
		}
		
	}

/*
	Omit PHP closing tag to help avoid accidental output
*/