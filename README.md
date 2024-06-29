# Laravel + React プロジェクト

このプロジェクトは、LaravelとReactを組み合わせたWebアプリケーションです。Laravelはバックエンドを担当し、Reactはフロントエンドを担当します。このREADMEでは、プロジェクトのセットアップ方法と主要なファイル構造について説明します。

## セットアップ

### 環境要件

- PHP 7.4 以上
- Composer
- Node.js 14 以上
- npm

### インストール

1. プロジェクトをクローンします。

    ```bash
    git clone https://github.com/eyamagishi/laravel-react.git
    cd laravel-react
    ```

2. Composerを使用してPHP依存関係をインストールします。

    ```bash
    composer install
    ```

3. npmを使用してJavaScript依存関係をインストールします。

    ```bash
    npm install
    ```

## ファイル構造

主要なファイルとディレクトリは以下のように配置されています。

```plaintext
/laravel-react
├── /app                  # Laravelアプリケーションのコアファイル
├── /bootstrap            # Laravelの起動設定ファイル
├── /config               # アプリケーションの設定ファイル
├── /database             # データベース関連のファイル
├── /public               # Web公開用ファイル（公開ディレクトリ）
├── /resources
│   ├── /scss             # SCSSファイル
│   ├── /ts               # TypeScriptファイル
│   │   ├── /components   # Reactコンポーネントなど
│   │   └── App.tsx       # Reactエントリーポイント
│   └── /views            # Laravelのビューファイル
├── /routes               # アプリケーションのルート定義
├── /storage              # キャッシュやログなどのストレージファイル
├── /tests                # テストファイル
├── .editorconfig         # エディタ設定ファイル
├── .env.example          # 環境設定の例ファイル
├── .gitattributes        # Gitの属性設定ファイル
├── .gitignore            # Gitの無視設定ファイル
├── artisan               # Laravelのコマンドラインツール
├── composer.json         # Composerの設定ファイル
├── composer.lock         # Composerの依存関係のロックファイル
├── LICENSE               # ライセンスファイル
├── package-lock.json     # npmの依存関係のロックファイル
├── package.json          # npmの設定ファイル
├── phpunit.xml           # PHPUnitの設定ファイル
├── README.md             # プロジェクトのREADMEファイル
├── tsconfig.json         # TypeScriptの設定ファイル
└── vite.config.ts        # Viteの設定ファイル
```

## 開発とビルド

開発モードでReactアプリケーションを起動します。

```bash
npm run dev
```

これにより、Viteが起動し、Reactアプリケーションがビルドされます。Laravelはポート3000で起動し、Reactアプリケーションと統合されます。

## ライセンス

このプロジェクトは MIT ライセンスの下でリリースされています。詳細については LICENSE ファイルを参照してください。
