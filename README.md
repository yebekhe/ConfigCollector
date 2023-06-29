# ConfigCollector
[![Collector](https://github.com/yebekhe/ConfigCollector/actions/workflows/ConfigUpdate.yml/badge.svg)](https://github.com/yebekhe/ConfigCollector/actions/workflows/ConfigUpdate.yml) [![Channels](https://github.com/yebekhe/ConfigCollector/actions/workflows/ProviderUpdate.yml/badge.svg)](https://github.com/yebekhe/ConfigCollector/actions/workflows/ProviderUpdate.yml)

<b>This project is intended for educational purposes only. Any other use of it, including commercial, personal, or non-educational use, is not accepted!</b>

This is a PHP script that collects V2Ray subscription links from various sources and saves them to different files based on their protocol type (VMess, VLess, Trojan, and Shadowsocks). 

## Instructions & Usage
Just import the following subscription link into the corresponding client. Use a client that at least support ss + vless + vmess + trojan.

| CONFIG TYPE | NORMAL SUBSCRIPTION | BASE64 SUBSCRIPTION | CLASH SUBSCRIPTION | CLASH.Meta SUBSCRIPTION |
|---|---|---|---|---|
| MIX of ALL | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/mix) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/mix_base64) | [CLASH SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/clash/mix.yml) | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/mix.yml) |
| VMESS | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/vmess) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/vmess_base64) | [CLASH SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/clash/vmess.yml) | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/vmess.yml) |
| VLESS | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/vless) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/vless_base64) | - | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/vless.yml) |
| REALITY | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/reality) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/reality_base64) | - | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/reality.yml) |
| TROJAN | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/trojan) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/trojan_base64) | [CLASH SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/clash/trojan.yml) | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/trojan.yml) |
| ShadowSocks | [NORMAL SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/shadowsocks) | [BASE64 SUBSCRIPTION](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/shadowsocks_base64) | [CLASH SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/clash/shadowsocks.yml) | [CLASH.Meta SUBSCRIPTION](https://github.com/yebekhe/ConfigCollector/raw/main/meta/shadowsocks.yml) |

## Manual Subs Conversion
- If your client does not support the formats that provided here use below services to convert them to your client format (like surfboard)
> Services for online sub conversion:
- [v2rayse](https://v2rayse.com/en/node-convert)
- [sub-web-modify](https://sub.v1.mk/)
- [bianyuan](https://bianyuan.xyz/)  

- **If you don't like the groups and rules that are already set, you can simply use bianyuan API like this (ONLY FOR BASE64 SUBSCRIPTION)::**  
> don't use this API for your personal subs! Pls run the subconverter locally
```
https://pub-api-1.bianyuan.xyz/sub?target=(OutputFormat)&url=(SubUrl)&insert=false

For Example:
(OutputFormat) = clash
(SubUrl) = https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/mix_base64

https://pub-api-1.bianyuan.xyz/sub?target=clash&url=https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/sub/mix_base64&insert=false

Now you can use the link above to import the subs into your client
```
## NODE Sources
You can check source of configs from [here](https://raw.githubusercontent.com/yebekhe/ConfigCollector/main/modules/config.php)

## License
This project is licensed under the MIT License - see the LICENSE file for details.
