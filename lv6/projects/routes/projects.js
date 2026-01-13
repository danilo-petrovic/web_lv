const express = require('express');
const router = express.Router();
const Project = require('../models/Project');

router.get('/', async (req, res) => {
  const projects = await Project.find();
  res.render('projects/index', { projects });
});

router.get('/new', (req, res) => {
  res.render('projects/new');
});

router.get('/:id', async (req, res) => {
  const project = await Project.findById(req.params.id);
  res.render('projects/details', { project });
});

router.get('/edit/:id', async (req, res) => {
  const project = await Project.findById(req.params.id);
  res.render('projects/edit', { project });
});

router.post('/edit/:id', async (req, res) => {
  await Project.findByIdAndUpdate(req.params.id, {
    naziv: req.body.naziv,
    opis: req.body.opis,
    cijena: req.body.cijena,
    poslovi: req.body.poslovi,
    datumPocetka: req.body.datumPocetka,
    datumZavrsetka: req.body.datumZavrsetka,
    clanovi: req.body.clanovi.split(',')
  });

  res.redirect('/projects');
});


router.post('/', async (req, res) => {
  await Project.create({
    naziv: req.body.naziv,
    opis: req.body.opis,
    cijena: req.body.cijena,
    poslovi: req.body.poslovi,
    datumPocetka: req.body.datumPocetka,
    datumZavrsetka: req.body.datumZavrsetka,
    clanovi: req.body.clanovi.split(',')
  });

  res.redirect('/projects');
});

router.get('/delete/:id', async (req, res) => {
  await Project.findByIdAndDelete(req.params.id);
  res.redirect('/projects');
});

module.exports = router;
