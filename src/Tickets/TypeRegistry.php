<?php
/**
 * Registers Event Tickets types to schema.
 *
 * @package \WPGraphQL\TEC\Tickets
 * @since 0.0.1
 */

namespace WPGraphQL\TEC\Tickets;

use WPGraphQL\Registry\TypeRegistry as GraphQLRegistry;
use WPGraphQL\TEC\Interfaces\TypeRegistryInterface;
use WPGraphQL\TEC\Tickets\Connection;
use WPGraphQL\TEC\Tickets\Type\Enum;
use WPGraphQL\TEC\Tickets\Type\WPInterface;
use WPGraphQL\TEC\Tickets\Type\WPObject;

/**
 * Class - TypeRegistry
 */
class TypeRegistry implements TypeRegistryInterface {

	/**
	 * {@inheritDoc}
	 */
	public static function init( GraphQLRegistry $type_registry ) : void {
		add_action( 'graphql_tec_register_et_enums', [ __CLASS__, 'register_enums' ] );
		add_action( 'graphql_tec_register_et_interfaces', [ __CLASS__, 'register_interfaces' ] );
		add_action( 'graphql_tec_register_et_objects', [ __CLASS__, 'register_objects' ] );
		add_action( 'graphql_tec_register_et_fields', [ __CLASS__, 'register_fields' ] );
		add_action( 'graphql_tec_register_et_connections', [ __CLASS__, 'register_connections' ] );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_enums( GraphQLRegistry $type_registry ) : void {
		Enum\PaypalCurrencyCodeOptionsEnum::register_type();
		Enum\StockHandlingOptionsEnum::register_type();
		Enum\StockModeEnum::register_type();
		Enum\TicketIdTypeEnum::register_type();
		Enum\TicketTypeEnum::register_type();
		Enum\TicketFormLocationOptionsEnum::register_type();

		/**
		 * Fires after ET enums have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_et_enums', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_interfaces( GraphQLRegistry $type_registry ) : void {
		WPInterface\Ticket::register_interface( $type_registry );
		WPInterface\PurchasableTicket::register_interface( $type_registry );

		/**
		 * Fires after ET interfaces have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_et_interfaces', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_objects( GraphQLRegistry $type_registry ) : void {
		/**
		 * Fires after ET objects have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_et_objects', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_fields( GraphQLRegistry $type_registry ) : void {
		WPObject\RsvpTicket::register_fields();
		WPObject\TecSettings::register_fields();

		/**
		 * Fires after ET fields have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_et_fields', $type_registry );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function register_connections( GraphQLRegistry $type_registry ) : void {
		/**
		 * Fires after ET connections have been registered.
		 *
		 * @param GraphQLRegistry $type_registry Instance of the WPGraphQL TypeRegistry.
		 */
		do_action( 'graphql_tec_after_register_et_connections', $type_registry );
	}
}
