# Bw_Jobs
[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://git.browserwerk.de/browserwerk/bw_jobs)

The BW_Jobs extension is an easy to install TYPO3 Extension for creating a powerful job list. It also is structured to the "Schema.org" standard which will push jobs automatically to job portals. 
# Installation
composer.json
```sh
  "browserwerk/bw-jobs": "^1.1",
```
- Add extension in the backend
- Append to template 
- Set the ID of the details page and the storage folders in the Constant Editor 

beautify URLs -> config.yaml
```sh
BwJobs:
 type: Extbase
 extension: BwJobs
 plugin: Frontend
 routes:
	 - { routePath: '/{job_slug}', _controller: 'Job::show', _arguments: {'job_slug': 'job'} }
 defaultController: 'Job::show'
 aspects:
	 job_slug:
		 type: PersistedAliasMapper
		 tableName: 'tx_bwjobs_domain_model_job'
		 routeFieldName: 'slug'
```

## Creating your First Jobs
Select the backend module
 1. Create category  
 2. Create contact
 3. Create Location 
  3.1 Attach contact
  4. Create Employment Type
  5. Create job and attach everything
## Add HTML-templates:
 Create new file extension/Configuration/TypoScript/Plugin/BwJobs.typoscript
 ```sh
  plugin.tx_bwjobs {
    view {
        templateRootPaths.1 = extension/Resources/Private/Fluid/BwJobs/Templates/
        partialRootPaths.1 = extension/Resources/Private/Fluid/BwJobs/Partials/
        layoutRootPaths.1 = extension/Resources/Private/Fluid/BwJobs/Layouts/
    }
}
```
## Features
- Multilanguage support
- Automatic Structured Data JSON for each job
- List Pagination Size adjustable (List View-> List Pagination Size )
- Automatic application form (Detail View,List View-> Checkbox Applications Form)
- Selection of the jobs to be displayed (List View)
- URLs were loaded into that Sitemap

| Where can I find what |  |
| ------------- | ------------- |
| Structured Data JSON  | /Classes/Service/StructuredDataService.php |
| Application form | /Resources/Private/Fluid/Forms] &&  /Resources/Private/Partials/Job/Application.html |

## Coming Soon 
1. Filter Frontend 
