<?php

namespace models;

abstract class Job
{
    const NAME = '';
    public static Factions $factions;
    public static bool $canKill;
    public NightSkill $nightSkill;
}