# Changelog

All notable changes to will be documented in this file.

## 2.0.2 - 2024-01-18
- Support for `guzzlehttp/guzzle ^7.0`.

## 2.0.0 - 2024-01-17

### Added
- Added support for API version v3 with `setApiVersion` method
- Added new Portal management features:
  - `getPortals` method to retrieve all available portals
  - `getChannels` method to get payment channels for specific portal
- Added new Payment Intent features:
  - `getPaymentIntent` method to retrieve payment intent details (v3 only)
- Added new Transaction management features (v3 only):
  - `getAllTransactions` method with comprehensive filtering options
  - `getTransactionByOrderNumber` method
  - `getTransactionsByPayerEmail` method
  - `getTransactionsByStatus` method
  - `getTransactionsByPaymentChannel` method
  - `getTransactionByReferenceNumber` method
- Added NETS payment channel support

### Changed
- Enhanced API support to handle both v2 and v3 endpoints
- Improved error handling for API version-specific features
- Updated base URI handling for different API versions

## 1.2.2 - 2024-09-25

- Fixed code for php7.4

## 1.2.1 - 2024-09-25

- Add SPayLater, Boost PayFlex, QRIS Indonesia Online Banking and QRIS Indonesia e-Wallet payment channel id.

## 1.2.0 - 2024-09-25

- Add DUITNOW_QR, SPAYLATER and BOOST_PAYFLEX payment channel id.

## 1.1.0 - 2024-09-20

- Fix bug for PHP 7.4

## 1.0.0 - 2024-07-31

- Initial release.