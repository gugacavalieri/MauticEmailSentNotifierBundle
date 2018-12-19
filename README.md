# Mautic Email Sent Notifier (Webhook)

<p align="right">
  <code>LIKED ? Leave a <a href="https://github.com/gugacavalieri/stryker-meteor-integration/stargazers">⭐</a> : <a href="https://github.com/gugacavalieri/stryker-meteor-integration/issues">😞</a></code>
</p>

Bundle features:
* Make a HTTP request everytime an email is sent!

## Quick Start:

1. Clone this repo inside your mautic plugins directory

```bash
git clone https://github.com/gugacavalieri/MauticEmailSentNotifierBundle.git
```
2. Clean cache using symfony commands
```
php app/console cache:clear
```
3. Open Mautic Plugins Page and click on **Install/Upgrade Plugins**

4. Configure:
  * Webhook URL
  * API Key (for validating request at server side)
  * Mautic Base URL for View In Browser URL

![image](https://user-images.githubusercontent.com/4624484/50228041-4470e700-038e-11e9-8fad-792f1a49520f.png)

## Extra info
1. Make sure the folder is named MauticEmailSentNotifierBundle *(same name as MauticEmailSentNotifierBundle.php)* . Otherwise you will get an namespace error when trying to clear the cache

## FAQ

### What is the Webhook URL parameter?

This is the Web Address (HTTP, HTTPS) that will be called after Mautic sends a
new email !

### What is the API Key Parameter?

The API Key parameter will be sent along with the HTTP request so that this
could be validated at your server. It's just a signature for validating the
request if wanted :)

### Why do I need to fill in the Mautic Base Url?

This parameter will be used for composing the JSON message, adding a field called
"viewUrl". This link contains the web address in which the Mautic Email can be
viewed using a Web Browser
