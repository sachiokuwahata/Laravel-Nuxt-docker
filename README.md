## feature/01
右記のコンテナ起動をするためのdockerfile/docker-compose
php / nginx / mysql / nuxt 

## feature/02
02_01:docker containerを起動
02_02:LaravelをInstall
02_03:NuxtをInstall
02_04:localhostでアクセス出来ることを確認

### 02_01:docker containerを起動
ルートディレクトリで
```
docker-compose up -d
```
### 02_02：LaravelのInstall
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

### 02_03:NuxtをInstall

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

### 02_04:localhostでアクセス出来ることを確認

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

