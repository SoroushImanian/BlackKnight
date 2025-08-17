<div align="center">
  <img src="/docs/BlackKnight.png" alt="BlackKnight Logo" width="400"/>
  <h1 align="center">BlackKnight</h1>
  <p align="center">
    <em>An automated V2Ray configuration collector script.</em>
  </p>
  <br />
  <p align="center">
    <a href="https://github.com/SoroushImanian/BlackKnight/stargazers">
      <img src="https://img.shields.io/github/stars/SoroushImanian/BlackKnight?style=for-the-badge&color=ffd000" alt="GitHub stars"/>
    </a>
    <a href="https://github.com/SoroushImanian/BlackKnight/issues">
      <img src="https://img.shields.io/github/issues/SoroushImanian/BlackKnight?style=for-the-badge&color=ff6a00" alt="GitHub issues"/>
    </a>
    <a href="https://github.com/SoroushImanian/BlackKnight/blob/main/LICENSE">
      <img src="https://img.shields.io/github/license/SoroushImanian/BlackKnight?style=for-the-badge&color=42c0ff" alt="License"/>
    </a>
    <img src="https://img.shields.io/github/last-commit/SoroushImanian/BlackKnight?style=for-the-badge&color=lightgrey" alt="GitHub last commit"/>
  </p>
</div>

---

## 📖 About The Project

In a world where unrestricted access to information is paramount, **BlackKnight** acts as an intelligent sentinel. This project utilizes a powerful PHP script to **automatically** and **continuously** monitor reputable Telegram channels, extracting the latest VPN configurations for various protocols.

Once collected, these configurations are intelligently categorized and provided as standard and Base64-encoded subscription links. This allows you to effortlessly import them into your favorite client and stay connected.

### ✨ Key Features

- **Fully Automated:** Continuously updates configurations with no manual intervention required.
- **Multi-Protocol Support:** Extracts VLESS, VMess, Trojan, Shadowsocks, Hysteria, TUIC, AnyTLS, and hy2 configs.
- **Standardized Output:** Provides clean, ready-to-use subscription links for maximum compatibility.
- **Easy Access:** Neatly organized by protocol for quick access.
- **Open Source & Extensible:** Welcomes community contributions to add new sources and improve functionality.

---

## ⚙️ How It Works

This project is not just a list; it's a fully automated system powered by GitHub Actions. Here's a quick look at the process:

1.  **Scheduled Run**: A GitHub Actions workflow runs automatically every hour.
2.  **Fetch Content**: The core PHP script scans a curated list of public Telegram channels.
3.  **Extract & Sanitize**: It intelligently extracts and cleans various VPN configurations.
4.  **Commit & Publish**: The newly collected configurations are committed back to this repository, updating all subscription links instantly.

---

## 🚀 Subscription Links

To use the configurations, copy the subscription link for your desired protocol and add it to your VPN client (e.g., V2RayNG, Nekoray, Streisand, etc.). The **MIX (All)** link contains a combination of all protocols.

> [!IMPORTANT]
> All subscription links are automatically updated every hour.

### 📁 **Normal Links**

| Protocol | Subscription Link | Protocol | Subscription Link |
| :---: | :---: | :---: | :---: |
| **VLESS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/vless) | **VMESS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/vmess) |
| **Trojan** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/trojan) | **Shadowsocks** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/ss) |
| **Hysteria** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/hysteria) | **Wireguard** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/refs/heads/main/sub/wireguard) |
| **TUIC** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/tuic) | **AnyTLS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/anytls) |
| **MIX (All)** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/mix) | | |

### 🔐 **Base64 Encoded Links**

| Protocol | Subscription Link | Protocol | Subscription Link |
| :---: | :---: | :---: | :---: |
| **VLESS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/vlessbase64) | **VMESS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/vmessbase64) |
| **Trojan** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/trojanbase64) | **Shadowsocks** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/ssbase64) |
| **Hysteria** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/refs/heads/main/sub/hysteriabase64) | **Wireguard** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/refs/heads/main/sub/wireguardbase64) |
| **TUIC** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/tuicbase64) | **AnyTLS** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/anytlsbase64) |
| **MIX (All)** | [**🔗 Click Here**](https://raw.githubusercontent.com/SoroushImanian/BlackKnight/main/sub/mixbase64) | | |

---

## 📡 Data Sources

This project derives its strength from numerous public Telegram channels. This list is managed within the project and is updated periodically to ensure quality sources.

> [!IMPORTANT]
> The list of Telegram channels may change at any time.

<details>
  <summary><strong>Click to see the full list of channels</strong></summary>
  
  | Channel Name | Channel Link | Channel Name | Channel Link |
  |--------------|--------------|--------------|--------------|
  | MsV2ray | [Link](https://t.me/s/MsV2ray) | foxrayiran | [Link](https://t.me/s/foxrayiran) |
  | DailyV2RY | [Link](https://t.me/s/DailyV2RY) | yaney_01 | [Link](https://t.me/s/yaney_01) |
  | FreakConfig | [Link](https://t.me/s/FreakConfig) | EliV2ray | [Link](https://t.me/s/EliV2ray) |
  | ServerNett | [Link](https://t.me/s/ServerNett) | proxystore11 | [Link](https://t.me/s/proxystore11) |
  | v2rayng_fa2 | [Link](https://t.me/s/v2rayng_fa2) | v2rayng_org | [Link](https://t.me/s/v2rayng_org) |
  | V2rayNGvpni | [Link](https://t.me/s/V2rayNGvpni) | custom_14 | [Link](https://t.me/s/custom_14) |
  | v2rayNG_VPNN | [Link](https://t.me/s/v2rayNG_VPNN) | v2ray_outlineir | [Link](https://t.me/s/v2ray_outlineir) |
  | v2_vmess | [Link](https://t.me/s/v2_vmess) | FreeVlessVpn | [Link](https://t.me/s/FreeVlessVpn) |
  | vmess_vless_v2rayng | [Link](https://t.me/s/vmess_vless_v2rayng) | PrivateVPNs | [Link](https://t.me/s/PrivateVPNs) |
  | freeland8 | [Link](https://t.me/s/freeland8) | vmessiran | [Link](https://t.me/s/vmessiran) |
  | Outline_Vpn | [Link](https://t.me/s/Outline_Vpn) | vmessq | [Link](https://t.me/s/vmessq) |
  | WeePeeN | [Link](https://t.me/s/WeePeeN) | V2rayNG3 | [Link](https://t.me/s/V2rayNG3) |
  | ShadowsocksM | [Link](https://t.me/s/ShadowsocksM) | shadowsocksshop | [Link](https://t.me/s/shadowsocksshop) |
  | v2rayan | [Link](https://t.me/s/v2rayan) | ShadowSocks_s | [Link](https://t.me/s/ShadowSocks_s) |
  | VmessProtocol | [Link](https://t.me/s/VmessProtocol) | napsternetv_config | [Link](https://t.me/s/napsternetv_config) |
  | Easy_Free_VPN | [Link](https://t.me/s/Easy_Free_VPN) | V2Ray_FreedomIran | [Link](https://t.me/s/V2Ray_FreedomIran) |
  | V2RAY_VMESS_free | [Link](https://t.me/s/V2RAY_VMESS_free) | v2ray_for_free | [Link](https://t.me/s/v2ray_for_free) |
  | V2rayN_Free | [Link](https://t.me/s/V2rayN_Free) | free4allVPN | [Link](https://t.me/s/free4allVPN) |
  | vpn_ocean | [Link](https://t.me/s/vpn_ocean) | configV2rayForFree | [Link](https://t.me/s/configV2rayForFree) |
  | FreeV2rays | [Link](https://t.me/s/FreeV2rays) | DigiV2ray | [Link](https://t.me/s/DigiV2ray) |
  | v2rayNG_VPN | [Link](https://t.me/s/v2rayNG_VPN) | freev2rayssr | [Link](https://t.me/s/freev2rayssr) |
  | v2rayn_server | [Link](https://t.me/s/v2rayn_server) | Shadowlinkserverr | [Link](https://t.me/s/Shadowlinkserverr) |
  | iranvpnet | [Link](https://t.me/s/iranvpnet) | vmess_iran | [Link](https://t.me/s/vmess_iran) |
  | mahsaamoon1 | [Link](https://t.me/s/mahsaamoon1) | V2RAY_NEW | [Link](https://t.me/s/V2RAY_NEW) |
  | v2RayChannel | [Link](https://t.me/s/v2RayChannel) | configV2rayNG | [Link](https://t.me/s/configV2rayNG) |
  | config_v2ray | [Link](https://t.me/s/config_v2ray) | vpn_proxy_custom | [Link](https://t.me/s/vpn_proxy_custom) |
  | vpnmasi | [Link](https://t.me/s/vpnmasi) | v2ray_custom | [Link](https://t.me/s/v2ray_custom) |
  | VPNCUSTOMIZE | [Link](https://t.me/s/VPNCUSTOMIZE) | HTTPCustomLand | [Link](https://t.me/s/HTTPCustomLand) |
  | ViPVpn_v2ray | [Link](https://t.me/s/ViPVpn_v2ray) | FreeNet1500 | [Link](https://t.me/s/FreeNet1500) |
  | v2ray_ar | [Link](https://t.me/s/v2ray_ar) | beta_v2ray | [Link](https://t.me/s/beta_v2ray) |
  | vip_vpn_2022 | [Link](https://t.me/s/vip_vpn_2022) | FOX_VPN66 | [Link](https://t.me/s/FOX_VPN66) |
  | VorTexIRN | [Link](https://t.me/s/VorTexIRN) | YtTe3la | [Link](https://t.me/s/YtTe3la) |
  | V2RayOxygen | [Link](https://t.me/s/V2RayOxygen) | Network_442 | [Link](https://t.me/s/Network_442) |
  | VPN_443 | [Link](https://t.me/s/VPN_443) | v2rayng_v | [Link](https://t.me/s/v2rayng_v) |
  | ultrasurf_12 | [Link](https://t.me/s/ultrasurf_12) | iSeqaro | [Link](https://t.me/s/iSeqaro) |
  | frev2rayng | [Link](https://t.me/s/frev2rayng) | frev2ray | [Link](https://t.me/s/frev2ray) |
  | Awlix_ir | [Link](https://t.me/s/Awlix_ir) | v2rayngvpn | [Link](https://t.me/s/v2rayngvpn) |
  | God_CONFIG | [Link](https://t.me/s/God_CONFIG) | Configforvpn01 | [Link](https://t.me/s/Configforvpn01) |
  | inikotesla | [Link](https://t.me/s/inikotesla) | forwardv2ray | [Link](https://t.me/s/forwardv2ray) |
  | ParsRoute | [Link](https://t.me/s/ParsRoute) | TUICity | [Link](https://t.me/s/TUICity) |

</details>

---

## 🤝 Contributing

**BlackKnight** is an open-source project and thrives on community contributions. If you have an idea for improvement, know of new channels to add, or have found a bug, please feel free to open an **Issue** or submit a **Pull Request**. Every contribution, no matter how small, is greatly appreciated.

---

## 📜 License

This project is licensed under the **MIT License**. See the [LICENSE](https://github.com/SoroushImanian/BlackKnight/blob/main/LICENSE) file for more details.

---
<div align="center">
  <p><em>“Power belongs to those who seek it”</em></p>
  <br/>
  <p><a href="https://SorBlack.com" target="_blank">Powered by SorBlack</a></p>
</div>
