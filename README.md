# feature/01
右記のコンテナ起動をするためのdockerfile/docker-compose
php / nginx / mysql / nuxt 

# feature/02
02_01:docker containerを起動
02_02:LaravelをInstall
02_03:NuxtをInstall
02_04:localhostでアクセス出来ることを確認

## 02_01:docker containerを起動
ルートディレクトリで
```
docker-compose up -d
```
## 02_02：LaravelのInstall
#### 02_02_01：php コンテナへ
```
docker-compose exec php bash
```

#### 02_02_02：LaravelをInstall
```
composer create-project laravel/laravel:^8.0 app
```
※ サービス名「app」にして下さい。（ nginxのルート設定で指定しているため ）
※ 8.0 Verで指定して下さい　( 他のバージョンで確認していません。 )

## 02_03:NuxtをInstall

#### 02_03_01：php コンテナへ
```
docker-compose exec nuxt sh
```

#### 02_03_02：NuxtをInstall
```
npm init nuxt-app app
```

#### 02_03_03：Nuxtの導入内容を回答
幾つか質問が来ます。
今回、絶対に回答して頂きたいのは下記2点です。
・Nuxt.js modules: Axios - Promise based HTTP client
・Rendering mode: Single Page App

## 02_04:localhostでアクセス出来ることを確認

#### 02_04_01：Laravelへアクセス
```
localhost:80
```

LaravelのHOME画面へ遷移できればInstall完了です。
<img src="https://user-images.githubusercontent.com/46374808/169027633-c4090d7b-f584-4454-bd96-6e41c8a24f70.png">

#### 02_04_02：Nuxtへアクセス
Container内の /work/app ディレクトリへ

```
npm run dev
```
Compiledが成功すると、こういった表示になるかと思います。

<img src="https://user-images.githubusercontent.com/46374808/169027860-b13386ac-fa8a-42cb-a615-8d00674d7495.png">


```
http://localhost:8080
```

NUXTのHOME画面へ遷移できればInstall完了です。
<img src="https://user-images.githubusercontent.com/46374808/169027843-3b341e2e-9b36-4942-974b-81f1c1e12779.png
">

# feature/03
LaravelとNuxtのAPI通信をします。

## 03_01: Controller作成 / API処理

```
php artisan make:controller TestAPIContoller
```
処理内容はTestAPIContollerを参照

## 03_02: Route設定

api.php に設定していきます。
api.phpを参照

## 03_03: ブラウザで確認
```
http://localhost/api/hello
```

アクセスすると"helloGet"が表示されるかと思います。
これで、文字列を返すAPI作成完了です。

# feature/04

## 04_01: NuxtからLaravelのAPIを呼び出す.

axiosというライブラリを使っていきます。
[02_03_03：Nuxtの導入内容を回答] で、指定して頂いたライブラリです。
・Nuxt.js modules: Axios - Promise based HTTP client

## 04_01_01: axiosの処理を作成

下記ファイルを作成
front/app/plugins/axios.js

ファイルの中身はaxios.jsを参照

## 04_01_02: nuxt.configへpluginsの反映

```
  plugins: [
    'plugins/axios' // 追記
  ],
```

## 04_01_03: nuxt.configへbaseURLの反映

```
  axios: {
    baseURL: 'http://localhost:80' // 追記
  },
```

## 04_02:　Nuxt画面へ表示

pages/index.vue　に呼び出しボタンを追記
index.vueを参照

下記のように helloGetが渡ってきていたら成功です。
<img src="https://user-images.githubusercontent.com/46374808/169037340-38c5bb3c-0861-48d8-b464-1a490b75a199.png
">




