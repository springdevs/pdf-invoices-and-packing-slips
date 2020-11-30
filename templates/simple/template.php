<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->get_invoice_title(); ?></title>
	<style>
		@page {
			margin-top: 1cm;
			margin-bottom: 3cm;
			margin-left: 2cm;
			margin-right: 2cm
		}

		* {
			line-height: 1.5em;
			/* font-family: 'DejaVu Sans', sans-serif; */
		}

		body {
			background: #fff;
			color: #000;
			margin: 0cm;
			font-family: 'Open Sans', sans-serif;
			/* font-family: 'DejaVu Sans', sans-serif; */
			font-size: 9pt;
			line-height: 100%;
			line-height: 1.3rem
		}

		h1,
		h2,
		h3,
		h4 {
			font-weight: 700;
			margin: 0
		}

		h1 {
			font-size: 16pt;
			margin: 5mm 0
		}

		h2 {
			font-size: 14pt
		}

		h3,
		h4 {
			font-size: 9pt
		}

		ol,
		ul {
			list-style: none;
			margin: 0;
			padding: 0
		}

		li,
		ul {
			margin-bottom: .75em
		}

		p {
			margin: 0;
			padding: 0
		}

		p+p {
			margin-top: 1.25em
		}

		a {
			border-bottom: 1px solid;
			text-decoration: none
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
			page-break-inside: always;
			border: 0;
			margin: 0;
			padding: 0
		}

		th,
		td {
			vertical-align: top;
			text-align: left
		}

		table.container {
			width: 100%;
			border: 0
		}

		tr.no-borders,
		td.no-borders {
			border: 0 !important;
			border-top: 0 !important;
			border-bottom: 0 !important;
			padding: 0 !important;
			width: auto
		}

		div.bottom-spacer {
			clear: both;
			height: 8mm
		}

		table.head {
			margin-bottom: 0mm
		}

		td.header img {
			max-height: 3cm;
			width: auto
		}

		td.header {
			font-size: 16pt;
			font-weight: 700
		}

		td.shop-info {
			width: 40%
		}

		.document-type-label {
			text-transform: uppercase
		}

		table.order-data-addresses {
			width: 100%;
			margin-bottom: 10mm
		}

		td.order-data {
			width: 40%
		}

		.invoice .shipping-address {
			width: 30%
		}

		.packing-slip .billing-address {
			width: 30%
		}

		td.order-data table th {
			font-weight: 400;
			padding-right: 2mm
		}

		table.order-details {
			width: 100%;
			margin-bottom: 0mm
		}

		.quantity,
		.price {
			width: 20%
		}

		.order-details tr {
			page-break-inside: always;
			page-break-after: auto
		}

		.order-details td,
		.order-details th {
			border-bottom: 1px #ccc solid;
			border-top: 1px #ccc solid;
			padding: .375em
		}

		.order-details th {
			font-weight: 700;
			text-align: left
		}

		.order-details thead th {
			color: #fff;
			background-color: #000;
			border-color: #000
		}

		.order-details tr.bundled-item td.product {
			padding-left: 5mm
		}

		.order-details tr.product-bundle td,
		.order-details tr.bundled-item td {
			border: 0
		}

		.order-details tr.bundled-item.hidden {
			display: none
		}

		dl {
			margin: 4px 0
		}

		dt,
		dd,
		dd p {
			display: inline;
			font-size: 7pt;
			line-height: 7pt
		}

		dd {
			margin-left: 5px
		}

		dd:after {
			content: "\A";
			white-space: pre
		}

		.wc-item-meta {
			margin: 4px 0;
			font-size: 7pt;
			line-height: 7pt
		}

		.wc-item-meta p {
			display: inline
		}

		.wc-item-meta li {
			margin: 0;
			margin-left: 5px
		}

		.document-notes,
		.customer-notes {
			margin-top: 5mm
		}

		table.totals {
			width: 100%;
			margin-top: 5mm
		}

		table.totals th,
		table.totals td {
			border: 0;
			border-top: 1px solid #ccc;
			border-bottom: 1px solid #ccc
		}

		table.totals th.description,
		table.totals td.price {
			width: 50%
		}

		table.totals tr.order_total td,
		table.totals tr.order_total th {
			border-top: 2px solid #000;
			border-bottom: 2px solid #000;
			font-weight: 700
		}

		table.totals tr.payment_method {
			display: none
		}

		#footer {
			position: absolute;
			bottom: -2cm;
			left: 0;
			right: 0;
			height: 2cm;
			text-align: center;
			border-top: .1mm solid gray;
			margin-bottom: 0;
			padding-top: 2mm
		}

		.pagenum:before {
			content: counter(page)
		}

		.pagenum,
		.pagecount {
			font-family: sans-serif
		}
	</style>
</head>

<body>
	<table class="head container">
		<tr>
			<td class="header">
				<?php if (get_option('pips_invoice_logo_height')) : ?>
					<img height="<?php echo get_option('pips_invoice_logo_height'); ?>" src="<?php echo get_option('pips_invoice_logo'); ?>" alt="Logo" />
				<?php else : ?>
					<img src="<?php echo get_option('pips_invoice_logo'); ?>" alt="Logo" />
				<?php endif; ?>
			</td>
			<td class="shop-info">
				<div class="shop-name">
					<h3><?php echo $this->get_shop_name(); ?></h3>
					<?php if ($this->get_shop_address()) : ?>
						<p><?php echo $this->get_shop_address(); ?></p>
					<?php endif; ?>
				</div>
			</td>
		</tr>
	</table>

	<table class="order-data-addresses">
		<tr>
			<td>
				<h1><?php _e('Invoice', 'sdevs_wea'); ?></h1>
			</td>
		</tr>
		<tr>
			<td class="address billing-address">
				<?php echo sdevs_is_pro_module_activate('pdf-invoices-and-packing-slips-pro') ? $this->get_customer_details() : $this->order->get_formatted_billing_address(); ?>
				<?php if ('yes' === get_option('pips_display_user_phone', 'no')) : ?>
					<div class="billing-phone"><?php echo $this->order->get_billing_phone(); ?></div>
				<?php endif; ?>
				<?php if ('yes' === get_option('pips_display_user_email', 'no')) : ?>
					<div class="billing-email"><?php echo $this->order->get_billing_email(); ?></div>
				<?php endif; ?>
			</td>
			<td class="address shipping-address">
				<?php if ($this->has_shipping_address()) : ?>
					<h3><?php _e('Ship To:', 'sdevs_wea'); ?></h3>
					<?php echo $this->order->has_shipping_address() ? (sdevs_is_pro_module_activate('pdf-invoices-and-packing-slips-pro') ? $this->get_shipping_details() : $this->order->get_formatted_shipping_address()) : 'N/A'; ?>
				<?php endif; ?>
			</td>
			<td class="order-data">
				<table>
					<?php if ('yes' === get_option('pips_display_invoice_number', 'no')) : ?>
						<tr class="invoice-number">
							<th><?php _e('Invoice Number:', 'sdevs_wea'); ?></th>
							<td># <?php echo $this->get_invoice_number(); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ('yes' === get_option('pips_display_invoice_date', 'no')) : ?>
						<tr class="invoice-date">
							<th><?php _e('Invoice Date:', 'sdevs_wea'); ?></th>
							<td><?php echo $this->get_invoice_date(); ?></td>
						</tr>
					<?php endif; ?>
					<tr class="order-number">
						<th>Order Number:</th>
						<td><?php echo $this->order->get_id(); ?></span>
						</td>
					</tr>
					<tr class="order-date">
						<th>Order Date:</th>
						<td><?php echo date("F d,Y", strtotime($this->order->get_date_created())); ?></td>
					</tr>
					<tr class="payment-method">
						<th>Payment Method:</th>
						<td><?php echo $this->order->get_payment_method_title(); ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<table class="order-details">
		<thead>
			<tr>
				<th class="product"><?php _e('Product', 'sdevs_wea'); ?></th>
				<th class="quantity"><?php _e('Quantity', 'sdevs_wea'); ?></th>
				<th class="price"><?php _e('Price', 'sdevs_wea'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->order->get_items() as $item_id => $item) : ?>
				<?php
				$product_variation_id = $item['variation_id'];
				// Check if product has variation.
				if ($product_variation_id) {
					$product = wc_get_product($item['variation_id']);
				} else {
					$product = wc_get_product($item['product_id']);
				}
				$sku = $product->get_sku();
				?>
				<tr class="wpo_wcpdf_item_row_class">
					<td class="product">
						<span class="item-name"><?php echo $item->get_name(); ?></span>
						<dl class="meta"><small>SKU: <?php echo $sku; ?></small></dl>
					</td>
					<td class="quantity"><?php echo $item->get_quantity(); ?></td>
					<td class="price"><?php echo wc_price($item->get_total()); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr class="no-borders">
				<td class="no-borders" style="border: none;">
					<?php if ($this->get_invoice_note()) : ?>
						<div class="document-notes">
							<h3><?php _e('Notes', 'sdevs_wea'); ?></h3>
							<p><?php echo $this->get_invoice_note(); ?></p>
						</div>
					<?php endif; ?>
					<?php if ($this->order->get_customer_note() != '' && 'yes' === get_option('pips_display_customer_note', 'yes')) : ?>
						<div class="customer-notes">
							<h3><?php _e('Customer Notes', 'sdevs_wea'); ?></h3>
							<p><?php echo $this->order->get_customer_note(); ?></p>
						</div>
					<?php endif; ?>
				</td>
				<td class="no-borders" colspan="2" style="border: none;">
					<table class="totals">
						<tfoot>
							<tr>
								<th class="description">Subtotal :</th>
								<td class="price"><span class="totals-price"><?php echo wc_price($this->order->get_subtotal()); ?></span></td>
							</tr>
							<?php if ($this->order->get_discount_total() != 0) : ?>
								<tr>
									<th class="description">Discount :</th>
									<td class="price"><span class="totals-price">- <?php echo $this->order->get_discount_to_display(); ?></span></td>
								</tr>
							<?php endif; ?>
							<tr>
								<th class="description">Total :</th>
								<td class="price"><span class="totals-price"><?php echo $this->order->get_formatted_order_total(); ?></span></td>
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>
		</tfoot>
	</table>

	<div class="bottom-spacer"></div>
	<?php if ($this->get_footer_note()) : ?>
		<div id="footer">
			<?php echo $this->get_footer_note(); ?>
		</div>
	<?php endif; ?>

</body>

</html>