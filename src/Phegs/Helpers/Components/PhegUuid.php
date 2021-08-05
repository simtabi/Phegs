<?php declare(strict_types=1);

namespace Simtabi\Pheg\Phegs\Helpers\Components;

use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;
use Simtabi\Pheg\Base\Exceptions\InvalidUuidVersionException;

class PhegUuid
{

    /**
     * The callback that should be used to generate UUIDs.
     *
     * @var callable
     */
    protected  $uuidFactory;


    /**
     * Generate a UUID (version 1,3,4 & 5).
     *
     * @return string
     * @throws InvalidUuidVersionException
     */
    public function generateUuid(int $version = 4, ?string $uuidString = '')
    {
        if ($this->uuidFactory) {
            return call_user_func($this->uuidFactory);
        }

        return match ($version) {
            1       => Uuid::uuid1()->toString(),
            3       => Uuid::uuid3(Uuid::NAMESPACE_DNS, $uuidString)->toString(),
            4       => Uuid::uuid4()->toString(),
            5       => Uuid::uuid5(Uuid::NAMESPACE_DNS, $uuidString)->toString(),
            default => throw new InvalidUuidVersionException(),
        };
    }

    /**
     * Generates a "Time Ordered" UUID (version 4) which is generated in conjunction with the server timestamp.  Less unique, but
     * useful if ordering by time is important
     *
     * @return UuidInterface
     */
    public function orderedUuid()
    {
        if ($this->uuidFactory) {
            return call_user_func($this->uuidFactory);
        }

        $factory = new UuidFactory();

        $factory->setRandomGenerator(new CombGenerator(
            $factory->getRandomGenerator(),
            $factory->getNumberConverter()
        ));

        $factory->setCodec(new TimestampFirstCombCodec(
            $factory->getUuidBuilder()
        ));

        return $factory->uuid4();
    }

    /**
     * Set the callable that will be used to generate UUIDs.
     *
     * @param  callable|null  $factory
     * @return void
     */
    public function createUuidsUsing(callable $factory = null)
    {
        $this->uuidFactory = $factory;
    }

    /**
     * Indicate that UUIDs should be created normally and not using a custom factory.
     *
     * @return void
     */
    public function createUuidsNormally()
    {
        $this->uuidFactory = null;
    }

    /**
     * Validate uuid version.
     *
     * @throws InvalidUuidVersionException
     */
    public function validateUuidVersion(int $value)
    {
        if (! in_array($value, [1, 3, 4, 5])) {
            throw new InvalidUuidVersionException();
        }
    }

    private static $instance = null;
    private static function Instance()
    {
        if(empty(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getUuidObj(): self
    {
        return self::Instance();
    }

}