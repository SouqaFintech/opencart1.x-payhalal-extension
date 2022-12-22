# Payhalal OpenCart1.x Extension

## Note

SouqaFintech SDN BHD **IS NOT RESPONSIBLE** for any problems that may arise from the use of this extension. Use this at your own risk. For any assistance, please email <mark>tech_support@payhalal.my</mark>.

## Requirements
- PHP 5.2 (bare minimum)
- Opencart 1.5.x.x
- cURL

## Supported Version

- [x] Opencart version 1.5.x.x 
- [x] Opencart version 1.5.x.x (tested with Journal 2 theme)

## Installation

If you have existing plugin, please backup your Opencart folder first.

Clone this repository:

```bash
git clone https://github.com/SouqaFintech/opencart1.x-payhalal-extension.git
```

Then place the downloaded folder into these 2 locations:

```
 <OpenCart_DIR>/admin/*
 <OpenCart_DIR>/catalog/*
```

Refer to the images below:

![image](https://payhalal.my/images/opencart/plugin_list.jpg) 

![image](https://payhalal.my/images/opencart/plugin_setting.jpg)

![image](https://payhalal.my/images/opencart/payment.jpg)

After that, login to your OpenCart administration, click on *"extension menu"*  and then click on *"Payments submenu"*.

You will see a list of payment method's available on Opencart. Click on the *"Install"* link for Payhalal to install this extension into your store.

After you have installed this extension, you need to click on the *"Edit"* link for Payhalal to configure this payment module in your Opencart store.

After you have activated the plugin and created your Payhalal account, head to the Payhalal Merchant Dashboard and click on Developer tools. Add the following URLs:

- Success URL: https://your-website/index.php?route=payment/payhalal/status
- Return URL: https://your-website/index.php?route=payment/payhalal/status
- Cancel URL: https://your-website/index.php?route=payment/payhalal/status
