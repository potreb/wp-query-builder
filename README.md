# About
Class for building custom queries for WP_Query.

# Usage
```
$query = ( new BuildCustomQuery() )
	->limit( 10 )
	->post_status( 'publish' )
	->post_type( 'post' )
	->cat( 10 )
	->tags( [ 120 ] ) // array or int
	->taxonomy( 'custom_taxonomy', 'term_id' ) // array or int
	->meta_query( 'custom_meta', 'value' )
	->query();
  ```
