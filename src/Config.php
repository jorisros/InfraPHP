<?php

declare(strict_types=1);

namespace Jorisros\InfraPhp;

final class Config
{
    private string $sslCertificateLocation;
    private string $nginx;
    private string $nginxOptionsSsl;
    private string $nginxSslDhparam;

    public function __construct(
        string $sslCertificateLocation,
        string $nginx,
        string $nginxOptionsSsl,
        string $nginxSslDhparam
    ) {
        if (!file_exists($sslCertificateLocation)) {
            throw new \Exception('Cant find the lets encrypt directory');
        }
        $this->sslCertificateLocation = $sslCertificateLocation;

        if (!file_exists($nginx)) {
            throw new \Exception('Cant find nginx');
        }
        $this->nginx = $nginx;

        if (!file_exists($nginxOptionsSsl)) {
            throw new \Exception('Cant find the ssl options file');
        }
        $this->nginxOptionsSsl = $nginxOptionsSsl;

        if (!file_exists($nginxSslDhparam)) {
            throw new \Exception('Cant find the ssl param');
        }
        $this->nginxSslDhparam = $nginxSslDhparam;
    }

    public function getSslCertificateLocation(): string
    {
        return $this->sslCertificateLocation;
    }

    public function getNginx(): string
    {
        return $this->nginx;
    }

    public function getNginxOptionsSsl(): string
    {
        return $this->nginxOptionsSsl;
    }

    public function getNginxSslDhparam(): string
    {
        return $this->nginxSslDhparam;
    }
}
