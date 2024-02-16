/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * Imports the InspectorControls component, which is used to wrap
 * the block's custom controls that will appear in in the Settings
 * Sidebar when the block is selected.
 *
 * Also imports the React hook that is used to mark the block wrapper
 * element. It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#inspectorcontrols
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps } from "@wordpress/block-editor";

/**
 * Imports the necessary components that will be used to create
 * the user interface for the block's settings.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/panel/#panelbody
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/text-control/
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/
 */
import { PanelBody, TextControl, ToggleControl } from "@wordpress/components";

/**
 * Imports the useEffect React Hook. This is used to set an attribute when the
 * block is loaded in the Editor.
 *
 * @see https://react.dev/reference/react/useEffect
 */
import { useEffect } from "react";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const {
		productoXPrecio,
		productoXPeso,
		productoXCantidad,
		productoYPrecio,
		productoYPeso,
		productoYCantidad,
		productoZPrecio,
		productoZPeso,
		productoZCantidad,
	} = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "carrito")}>
					<TextControl
						label={__("Precio Producto X", "carrito")}
						value={productoXPrecio}
						onChange={(value) =>
							setAttributes({ productoXPrecio: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Peso Producto X", "carrito")}
						value={productoXPeso}
						onChange={(value) =>
							setAttributes({ productoXPeso: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Cantidad Producto X", "carrito")}
						value={productoXCantidad}
						onChange={(value) =>
							setAttributes({ productoXCantidad: parseInt(value, 10) })
						}
					/>

					<TextControl
						label={__("Precio Producto Y", "carrito")}
						value={productoYPrecio}
						onChange={(value) =>
							setAttributes({ productoYPrecio: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Peso Producto Y", "carrito")}
						value={productoYPeso}
						onChange={(value) =>
							setAttributes({ productoYPeso: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Cantidad Producto Y", "carrito")}
						value={productoYCantidad}
						onChange={(value) =>
							setAttributes({ productoYCantidad: parseInt(value, 10) })
						}
					/>

<TextControl
						label={__("Precio Producto Z", "carrito")}
						value={productoZPrecio}
						onChange={(value) =>
							setAttributes({ productoZPrecio: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Peso Producto Z", "carrito")}
						value={productoZPeso}
						onChange={(value) =>
							setAttributes({ productoZPeso: parseInt(value, 10) })
						}
					/>
					<TextControl
						label={__("Cantidad Producto Z", "carrito")}
						value={productoZCantidad}
						onChange={(value) =>
							setAttributes({ productoZCantidad: parseInt(value, 10) })
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...useBlockProps()}>
				<p>Producto X</p>
				<p>Precio : {productoXPrecio}</p>
				<p>Peso : {productoXPeso}</p>
				<p>Cantidad : {productoXCantidad}</p>
				<hr />
				<p>Producto Y</p>
				<p>Precio : {productoYPrecio}</p>
				<p>Peso : {productoYPeso}</p>
				<p>Cantidad : {productoYCantidad}</p>
				<hr />
				<p>Producto Z</p>
				<p>Precio : {productoZPrecio}</p>
				<p>Peso : {productoZPeso}</p>
				<p>Cantidad : {productoZCantidad}</p>
				<hr />
			</div>
		</>
	);
}
