<?php

/**
 *      @SWG\Definition(
 * 		    definition="error_default_1",
 *          description="Error of business (catch by developer)",
 * 		    @SWG\Property(property="_type", type="string", description="Error type", default="client_error"),
 * 		    @SWG\Property(property="_time", type="string", description="Time response", default="2016-05-19 02:43:52"),
 * 		    @SWG\Property(property="message", type="string", description="Text message", default="")
 *      )
 */

/**
 *      @SWG\Definition(
 * 		    definition="error_default_2",
 *          description="Error of logic (occurs on runtime)",
 * 		    @SWG\Property(property="_type", type="string", description="Error type", default="client_error"),
 * 		    @SWG\Property(property="_time", type="string", description="Time response", default="2016-05-19 02:43:52"),
 * 		    @SWG\Property(property="errors", type="object",
 *              @SWG\Property(property="message", type="string", description="Message error", default="Error at ..."),
 *              @SWG\Property(property="traces", type="array", description="Tracking error", @SWG\Items(type="object"))
 *          )
 *      )
 */