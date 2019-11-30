<?php
/**
 * Custom Queries. Builder.
 *
 * @package WPSL
 */

/**
 * Build custom queries.
 */
class BuildCustomQuery {

	/**
	 * Query args.
	 *
	 * @var array
	 */
	private $args;

	/**
	 * BuildBlockQuery constructor.
	 */
	public function __construct() {
		$this->args['posts_per_page'] = 10;
		$this->args['post_type']      = array( 'posts' );
		$this->args['post_status']    = array( 'publish' );
		$args['orderby']              = 'date';
		$args['order']                = 'DESC';
	}

	/**
	 * Set order.
	 *
	 * @param string $order Order.
	 *
	 * @return $this
	 */
	public function order( $order ) {
		if ( $order ) {
			$this->args['order'] = $order;
		}

		return $this;
	}

	/**
	 * Set orderby.
	 *
	 * @param string $orderby Order by field.
	 *
	 * @return $this
	 */
	public function orderby( $orderby ) {
		if ( $orderby ) {
			$this->args['orderby'] = $orderby;
		}

		return $this;
	}

	/**
	 * Set limit.
	 *
	 * @param int $limit Limit.
	 *
	 * @return $this
	 */
	public function limit( $limit ) {
		$limit = (int) $limit;
		if ( $limit ) {
			$this->args['posts_per_page'] = (int) $limit;
		}

		return $this;
	}

	/**
	 * Set cat.
	 *
	 * @param int $cat Category ID.
	 *
	 * @return $this
	 */
	public function cat( $cat ) {
		if ( ! empty( $cat ) ) {
			$this->args['cat'] = $cat;
		}

		return $this;
	}

	/**
	 * Set tags.
	 *
	 * @param string|array $tags Tags IDs.
	 *
	 * @return $this
	 */
	public function tags( $tags ) {
		if ( ! empty( $tags ) ) {
			$this->args['tag_in'] = $tags;
		}

		return $this;
	}

	/**
	 * Set author.
	 *
	 * @param int $author Author ID.
	 *
	 * @return $this
	 */
	public function author( $author ) {
		if ( ! empty( $author ) ) {
			$this->args['author'] = $author;
		}

		return $this;
	}

	/**
	 * Set custom taxonomy.
	 *
	 * @param string       $taxonomy Taxonomy name.
	 * @param string|array $terms    Terms.
	 * @param string       $field    Field name.
	 *
	 * @return $this
	 */
	public function taxonomy( $taxonomy, $terms, $field = 'term_id' ) {
		if ( ! empty( $taxonomy ) && ! empty( $terms ) ) {
			$this->args['tax_query'][] = [
				'taxonomy' => $taxonomy,
				'field'    => $field,
				'terms'    => $terms,
			];
		}

		return $this;
	}

	/**
	 * Set post types.
	 *
	 * @param array|string $post_types Post types.
	 *
	 * @return $this
	 */
	public function post_type( $post_types ) {
		if ( ! empty( $post_types ) ) {
			$this->args['post_type'] = $post_types;
		}

		return $this;
	}

	/**
	 * Set post status.
	 *
	 * @param array|string $post_status Post types.
	 *
	 * @return $this
	 */
	public function post_status( $post_status ) {
		if ( ! empty( $post_status ) ) {
			$this->args['post_status'] = $post_status;
		}

		return $this;
	}

	/**
	 * Set meta query.
	 *
	 * @param string $key     Key.
	 * @param string $value   Value.
	 * @param string $compare Compare.
	 *
	 * @return $this
	 */
	public function meta_query( $key, $value, $compare = '=' ) {
		if ( ! empty( $key ) && ! empty( $value ) ) {
			$this->args['meta_query'][] = [
				'key'     => $key,
				'value'   => $value,
				'compare' => $compare,
			];
		}

		return $this;
	}

	/**
	 * Get query.
	 *
	 * @return WP_Query
	 */
	public function query() {
		return new WP_Query( $this->args );
	}

	/**
	 * Get args.
	 */
	public function get() {
		return $this->args;
	}

}
