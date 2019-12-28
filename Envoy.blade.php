@include('./vendor/autoload.php')

@setup
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    try {
        $dotenv->load();
        $dotenv->required(['DEPLOY_SERVER', 'DEPLOY_REPOSITORY', 'DEPLOY_PATH'])->notEmpty();
    } catch ( Exception $exception )  {
        echo $exception->getMessage();
    }
    $pathToSite     = getenv('DEPLOY_PATH');
    $sshServer      = getenv('DEPLOY_SERVER');
    $discordWebHook = getenv('DISCORD_WEBHOOK');
    $appName        = getenv('APP_NAME');
@endsetup

@servers(['web' => [$sshServer]])

@task('deploy', ['on' => 'web'])
    cd {{ $pathToSite }}

    git pull origin master
    echo "Dépôt mis à jour"

    composer install --no-interaction --quiet --no-dev --prefer-dist --optimize-autoloader
    echo "Composer mis à jour"

    @if ($cache)
        rm -rf cache/
        echo "Le répertoire du cache twig a bien été vidé"
    @endif
@endtask

@task('clr-cache', ['confirm' => true])
    cd {{ $pathToSite }}

    rm -rf cache/
    echo "Le répertoire du cache twig a bien été vidé"
@endtask

@finished
    @discord($discordWebHook, 'Le site $appName a bien été déploiyé')
@endfinished