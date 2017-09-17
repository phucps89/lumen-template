<?php

/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Backend documented API",
 *     version="1.0.0"
 *   ),
 *   schemes={"http", "https"},
 *   host="",
 *   basePath="/"
 * )
 */

/**
 *      @SWG\Definition(
 * 		    definition="response_template_data",
 *          description="Response with data is array or object",
 * 		    @SWG\Property(property="_type", type="string", description="type", default="success"),
 * 		    @SWG\Property(property="_time", type="string", description="Time response", default="2016-05-19 02:43:52"),
 * 		    @SWG\Property(property="results", type="array|object", description="Data response")
 *      )
 */

/**
 *      @SWG\Definition(
 * 		    definition="response_template_message",
 *          description="Response with data is message",
 * 		    @SWG\Property(property="_type", type="string", description="type", default="success"),
 * 		    @SWG\Property(property="_time", type="string", description="Time response", default="2016-05-19 02:43:52"),
 * 		    @SWG\Property(property="message", type="string", description="Message from server", default="Message content")
 *      )
 */