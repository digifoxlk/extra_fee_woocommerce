# WooCommerce Custom Payment Gateway Fee

This script dynamically adds a processing fee based on the selected payment gateway at checkout in WooCommerce. It is ideal for store owners who want to apply different fee percentages for specific gateways like Daraz BNPL, Payzy, etc.

---

## 💡 Features

- Adds a dynamic fee based on cart subtotal.
- Custom percentage fee for each payment method.
- Automatically updates the fee when a payment gateway is changed.
- Lightweight and secure.
- Easy to customize.

---

## 🔧 Setup Instructions

### 1. Copy and Paste the Code

Add the provided PHP code to one of the following:
- Your child theme's `functions.php` file, **OR**
- A custom plugin (recommended for production use).

### 2. Customize Gateway Fees

Edit the following section to add or change gateways and their corresponding fee percentage:

```php
$gateway_fees = array(
    'darazbnpl' => 0.11, // 11%
    'payzy'     => 0.11, // 11%
);
```

### 3. Add Friendly Names (Optional)

You can optionally map the internal gateway ID to a user-friendly name for display:

```php
Copy
Edit
$gateway_labels = array(
    'darazbnpl' => 'Daraz BNPL',
    'payzy'     => 'Payzy',
);
```

### 💰 Example

If the cart total is LKR 10,000 and the customer selects Daraz BNPL:

An additional 11% (LKR 1,100) will be added as a processing fee.

### 📌 Notes

The percentage is applied on cart subtotal only (not including shipping or taxes).

Ensure your payment gateway IDs (darazbnpl, payzy, etc.) match those defined in your WooCommerce payment settings.

### 🔐 Security Considerations

Type checking ensures the gateway ID is valid.

No external input is used for fee amount calculations.

Recommended to use in a child theme or custom plugin for safety during theme updates.

### 🧑‍💻 Developer Info

Author: Buddhi Rangana

Language: PHP

WooCommerce Compatible: ✅ Tested with WooCommerce 7.x+
