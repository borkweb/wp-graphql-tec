<?php
/**
 * Registers Common types to schema.
 *
 * @package \WPGraphQL\TEC\Common
 * @since 0.0.1
 */

namespace WPGraphQL\TEC\Common;

use WPGraphQL\Registry\TypeRegistry as GraphQLRegistry;
use WPGraphQL\TEC\Common\Connection;
use WPGraphQL\TEC\Common\Type\Enum;
use WPGraphQL\TEC\Common\Type\WPInterface;
use WPGraphQL\TEC\Common\Type\WPObject;
use WPGraphQL\TEC\Interfaces\TypeRegistryInterface;

/**
 * Class - TypeRegistry
 */
class TypeRegistry implements TypeRegistryInterface {

	/**
	 * {@inheritDoc}
	 */
	public static function init( GraphQLRegistry $type_registry ) : void {
		add_action( 'graphql_tec_register_common_enums', [ __CLASS__, 'register_enums' ] );
		add_action( 'graphql_tec_register_common_interfaces', [ __CLASS__, 'register_interfaces' ] );
		add_action( 'graphql_tec_register_common_objects', [ __CLASS__, 'register_objects' ] );
		add_action( 'graphql_tec_register_common_fields', [ __CLASS__, 'register_fields' ] );
		add_action( 'graphql_tec_register_common_connections', [ __CLASS__, 'register_connections' ] );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_enums( GraphQLRegistry $type_registry ) : void {
		Enum\TimezoneModeEnum::register_type();

		/**
		 * Fires after common enums have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_common_enums', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_interfaces( GraphQLRegistry $type_registry ) : void {
		/**
		 * Fires after common interfaces have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_common_interfaces', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_objects( GraphQLRegistry $type_registry ) : void {
		WPObject\TecSettings::register_type();

		/**
		 * Fires after common objects have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_common_objects', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_fields( GraphQLRegistry $type_registry ) : void {
		/**
		 * Fires after common fields have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_common_fields', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_connections( GraphQLRegistry $type_registry ) : void {
		/**
		 * Fires after common connections have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_common_connections', $type_registry );
	}
}
