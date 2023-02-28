# Payhalal OpenCart1.x Extension

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

## Requirements
- PHP 5.2 (bare minimum)
- Opencart 1.5.x.x
- cURL

## Supported Version

- [x] Opencart version 1.5.x.x 
- [x] Opencart version 1.5.x.x (tested with Journal 2 theme)

Refer to the images below:

Go to your opencart admin then go to Extension > Payments to view Payhalal plugin. Please refer image below

![image](https://payhalal.my/images/opencart/plugin_list.jpeg) 

- Copy the api key either testing or production by login to your <a href='https://merchant.payhalal.my'>merchant dashboard</a>. Go to General > Developer Tools and view the app key and insert the key in the form shown below in your opencart side for payhalal plugin.

- Your can either enable testing or live depends on your need once you finish doing testing, you can enable the plugin to live mode.

![image](https://payhalal.my/images/opencart/plugin_setting.jpg)

![image](https://payhalal.my/images/opencart/payment.jpg)

After that, login to your OpenCart administration, click on *"extension menu"*  and then click on *"Payments submenu"*.

You will see a list of payment method's available on Opencart. Click on the *"Install"* link for Payhalal to install this extension into your store.

After you have installed this extension, you need to click on the *"Edit"* link for Payhalal to configure this payment module in your Opencart store.

After you have activated the plugin and created your Payhalal account, head to the Payhalal Merchant Dashboard and click on Developer tools. Add the following URLs:

Refer to the images below: 

- Login to your <a href='https://merchant.payhalal.my' target='_blank'>merchant dashboard</a>. Then on the left menu click General > Developer Tools, click edit app to insert the url (please refer image below).
![image](https://payhalal.my/images/opencart/developer_tools.jpeg)

- Select which app key that you want to integrate with opencart plugin and insert the URL's as mention below and DO NOT insert callback url for this plugin. Click save button once you finish adding the url's.

![image](https://payhalal.my/images/opencart/url_setting.jpeg)

- Success URL: https://your-website/index.php?route=payment/payhalal/status
- Return URL: https://your-website/index.php?route=payment/payhalal/status
- Cancel URL: https://your-website/index.php?route=payment/payhalal/status
- Callback URL: Please leave this blank to avoid any issues

**Replace "your-website" with your shopping cart domain.**

## Note

SouqaFintech SDN BHD **IS NOT RESPONSIBLE** for any problems that may arise from the use of this extension. Use this at your own risk. For any assistance, please email <mark>tech_support@payhalal.my</mark>.
