# 打包 ctf0/media-manager
此套件複雜度高，以原本方式使用不容易修改、增加前端JS打包時間與大小。
拆開到另外的Namespace(或Package)使用上比較方便

## 建立 Namespace
### 完成安裝
- `composer require ctf0/media-manager`
- `php artisan vendor:publish --provider="ctf0\MediaManager\MediaManagerServiceProvider"`
- `php artisan lmm:setup`

** dependencies 先不安裝

### composer.json
- 增加 dont-discover，因為要改寫 ctf0/media-manager service provider
- 增加 autoload psr-4

### 移動套件的publish
- config/mediaManager.php => MediaManager/Config/config.php
- database/MediaManager.sqlite => MediaManager/Database/MediaManager.sqlite
- database/migrations => MediaManager/Database/Migrations
- resources/assets/vendor/MediaManager => MediaManager/Resources/vendor
- resources/lang/vendor/MediaManager => MediaManager/Resources/lang
- resources/views/vendor/MediaManager => MediaManager/Resources/views

** config/mediaManager.php `allowed_folderNames_chars` 定義的正規表示式有誤，新增資料夾時會炸，請在 - 前加入 \ 成為 `'_\-\s'`

### 增加 MediaManager/Providers
- `MediaManagerServiceProvider`: 註冊 config, translation, views. 請加入到 app.conf `providers`
- `PackageServiceProvider`: 將原本的 packagePublish 取消執行

** `viewComp()` 內有定義前端元件使用的路徑與變數，如需要更改路徑請改寫此方法。

### dependencies
請切換到 MediaMedia 底下

#### package.json
- `npm init -y` 建立空的 package.json
- 安裝 ctf0/media-manager 文件的 dependencies
- 安裝 laravel-mix 等套件： `npm install laravel-mix cross-env sass sass-loader resolve-url-loader`
- 加上 scripts

#### webpack.mix.js
- `setPublicPath` 設定 base path
- 修改 js, sass copyDirectory路徑


## 轉到已存在的專案
- 複製 MediaManager 到 專案根目錄
- 修改 composer.json (dont-discover, autoload)
- .gitignore 加上 /**/node_modules
- config/app.php 加上 `MediaManager\Providers\MediaManagerServiceProvider::class` (需在 RouteServiceProvider 前)
- 修改 MediaManager/webpack.mix.js 輸出 js, css (會與原本的衝突)
- 修改 views/media, _manager 的 asset url
